"""
lambda_function.py
--------------------------------------------------------------------
Trigger: S3 -> ObjectCreated event (configured on the bucket)
Action : Reads the uploaded object's metadata (HeadObject) and
         publishes a formatted message to an SNS topic.
         SNS then emails every subscriber on the topic.

Environment variable required:
    SNS_TOPIC_ARN = arn:aws:sns:REGION:ACCOUNT_ID:your-topic-name

IAM Role for this Lambda needs:
    - s3:GetObject
    - s3:GetObjectMetadata (covered by GetObject/HeadObject)
    - sns:Publish
    - logs:CreateLogGroup / CreateLogStream / PutLogEvents
--------------------------------------------------------------------
"""

import boto3
import os
import urllib.parse
import json

s3 = boto3.client('s3')
sns = boto3.client('sns')

SNS_TOPIC_ARN = os.environ['SNS_TOPIC_ARN']


def lambda_handler(event, context):
    record = event['Records'][0]

    bucket = record['s3']['bucket']['name']
    key = urllib.parse.unquote_plus(record['s3']['object']['key'])

    try:
        # HeadObject returns metadata without downloading the file
        response = s3.head_object(Bucket=bucket, Key=key)

        size = response.get('ContentLength', 'unknown')
        content_type = response.get('ContentType', 'unknown')
        last_modified = str(response.get('LastModified', 'unknown'))
        custom_metadata = response.get('Metadata', {})  # dict of user metadata set at upload

        message_lines = [
            "A new file was uploaded to S3.",
            "",
            f"Bucket        : {bucket}",
            f"File (Key)    : {key}",
            f"Size          : {size} bytes",
            f"Content-Type  : {content_type}",
            f"Last Modified : {last_modified}",
            "",
            "Custom metadata:",
        ]

        if custom_metadata:
            for k, v in custom_metadata.items():
                message_lines.append(f"  - {k}: {v}")
        else:
            message_lines.append("  (none)")

        message = "\n".join(message_lines)
        subject = f"New S3 Upload: {key}"

        sns.publish(
            TopicArn=SNS_TOPIC_ARN,
            Subject=subject[:100],  # SNS subject limit is 100 chars
            Message=message
        )

        return {
            'statusCode': 200,
            'body': json.dumps(f'Notification sent for {key}')
        }

    except Exception as e:
        print(f"Error processing {key} from {bucket}: {str(e)}")
        raise e
