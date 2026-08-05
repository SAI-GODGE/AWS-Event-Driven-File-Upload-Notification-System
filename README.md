# 📂 AWS Event-Driven File Upload Notification System

An event-driven file upload application built using AWS services that automatically sends email notifications whenever a user uploads a file.

Instead of manually checking whether a file has been uploaded, the system automatically processes the upload, triggers a serverless function, and sends the file details via email.

---

## 🚀 Project Overview

This project demonstrates how multiple AWS services work together to create an automated event-driven workflow.

A user uploads a file through a PHP web application hosted on an Amazon EC2 instance. The file is stored in an Amazon S3 bucket, which triggers an AWS Lambda function. Lambda extracts the uploaded file's metadata and publishes it to an Amazon SNS topic. SNS then sends an email notification to all subscribed users.

---

## 🏗️ Architecture

```
                User
                  │
                  ▼
      PHP Web Application (EC2)
                  │
                  ▼
          Amazon S3 Bucket
                  │
     ObjectCreated Event Trigger
                  │
                  ▼
            AWS Lambda
                  │
      Read Uploaded File Metadata
                  │
                  ▼
             Amazon SNS
                  │
                  ▼
          Email Notification
```

---

## 🛠️ AWS Services Used

- Amazon EC2
- Amazon S3
- AWS Lambda
- Amazon SNS
- AWS IAM
- Amazon CloudWatch

---

## 💻 Technologies Used

- PHP
- Python 3.12
- AWS SDK for PHP
- Composer
- Apache HTTP Server
- Amazon Linux 2023

---

## 📋 Workflow

1. User uploads a file using the PHP web application.
2. The application uploads the file to an Amazon S3 bucket.
3. S3 automatically triggers an AWS Lambda function.
4. Lambda reads the uploaded file metadata.
5. Lambda publishes the information to an Amazon SNS topic.
6. SNS sends an email notification to subscribed users.
7. CloudWatch stores execution logs for monitoring and troubleshooting.

---

## 📁 Project Structure

```
.
├── index.html          # File upload form
├── s3upload.php        # Uploads files to Amazon S3
├── lambda_function.py  # Processes S3 events
├── README.md
└── screenshots/
```

---

## 🔐 IAM Permissions

### EC2 Role

- s3:PutObject

### Lambda Role

- s3:GetObject
- sns:Publish

The project follows AWS best practices by using IAM Roles instead of storing AWS Access Keys inside the application.

---

## ⚙️ Key Features

- Event-driven architecture
- Serverless processing using AWS Lambda
- Automatic email notifications
- Secure file uploads
- IAM Role-based authentication
- CloudWatch monitoring
- Fully automated workflow

---

## 📷 Project Screenshots

Create a folder named **screenshots** and include images such as:

- Architecture Diagram
- S3 Bucket
- SNS Topic
- Lambda Function
- IAM Roles
- Event Notification Configuration
- EC2 Instance
- PHP Upload Page
- Successful Upload
- Email Notification
- CloudWatch Logs

Example:

```
screenshots/
│
├── architecture.png
├── s3-bucket.png
├── lambda.png
├── sns-topic.png
├── upload-page.png
├── upload-success.png
├── email-notification.png
└── cloudwatch-logs.png
```

---

## ✅ Result

The project successfully implements an automated event-driven file upload system using AWS.

Whenever a user uploads a file through the PHP application:

- The file is stored in Amazon S3.
- S3 automatically invokes AWS Lambda.
- Lambda extracts the uploaded file information.
- Amazon SNS sends an email notification.
- CloudWatch records the execution logs.

This eliminates manual monitoring and demonstrates how AWS services can be combined to build scalable, serverless, event-driven applications.

---

## 🎯 Learning Outcomes

Through this project, I gained hands-on experience with:

- Event-driven architectures
- AWS Lambda triggers
- Amazon S3 event notifications
- Amazon SNS messaging
- IAM Roles and Policies
- CloudWatch logging
- PHP integration with AWS SDK
- Building serverless workflows

---

## 👨‍💻 Author

**Saiprasad Sambhaji Godge**

If you found this project helpful, feel free to ⭐ the repository and share your feedback!
