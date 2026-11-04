<h1 align="center">AWS Event-Driven File Upload Notification System</h1>

<p align="center">
  <b>An automated, event-driven file upload system that sends email notifications using AWS serverless services.</b>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/AWS-Cloud-orange?logo=amazonaws&logoColor=white" alt="AWS"/>
  <img src="https://img.shields.io/badge/PHP-Web%20Application-777BB4?logo=php&logoColor=white" alt="PHP"/>
  <img src="https://img.shields.io/badge/Python-3.12-3776AB?logo=python&logoColor=white" alt="Python"/>
  <img src="https://img.shields.io/badge/Architecture-Event--Driven-blueviolet" alt="Event Driven Architecture"/>
</p>

---

## 🚀 Project Overview

This project demonstrates how AWS services can be integrated to build an automated file upload and email notification system.

Users upload files through a PHP web application hosted on Amazon EC2. Amazon S3 stores the uploaded files and automatically triggers an AWS Lambda function. Lambda extracts the file details and publishes a notification to Amazon SNS, which sends an email to subscribed users.

The entire process runs automatically without requiring manual monitoring.

## 🏗️ Architecture

```mermaid
flowchart TD
    A["User"] --> B["Amazon EC2<br/>PHP Web Application"]
    B --> C[("Amazon S3<br/>File Storage")]
    C -->|"ObjectCreated Event"| D["AWS Lambda<br/>Python"]
    D --> E["Amazon SNS"]
    E --> F["Email Notification"]

    D -.-> G[("Amazon CloudWatch<br/>Logs")]

    classDef app fill:#E8F2FF,stroke:#2563EB,color:#1E3A8A
    classDef storage fill:#FFF4E5,stroke:#D97706,color:#92400E
    classDef compute fill:#E6F9ED,stroke:#16A34A,color:#166534
    classDef messaging fill:#FCE7F3,stroke:#DB2777,color:#9D174D
    classDef monitoring fill:#F3E8FF,stroke:#9333EA,color:#6B21A8

    class A,B app
    class C storage
    class D compute
    class E,F messaging
    class G monitoring
```


## 🛠️ AWS Services

<p align="center">
  <img src="https://skillicons.dev/icons?i=aws" alt="Amazon Web Services" />
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Amazon%20EC2-FF9900?style=for-the-badge&logo=amazonaws&logoColor=white" alt="Amazon EC2"/>
  <img src="https://img.shields.io/badge/Amazon%20S3-569A31?style=for-the-badge&logo=amazons3&logoColor=white" alt="Amazon S3"/>
  <img src="https://img.shields.io/badge/AWS%20Lambda-FF9900?style=for-the-badge&logo=awslambda&logoColor=white" alt="AWS Lambda"/>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Amazon%20SNS-FF4F8B?style=for-the-badge&logo=amazonaws&logoColor=white" alt="Amazon SNS"/>
  <img src="https://img.shields.io/badge/AWS%20IAM-232F3E?style=for-the-badge&logo=amazonaws&logoColor=white" alt="AWS IAM"/>
  <img src="https://img.shields.io/badge/CloudWatch-FF9900?style=for-the-badge&logo=amazonaws&logoColor=white" alt="Amazon CloudWatch"/>
</p>

## 💻 Technology Stack

| Category | Technologies |
|---|---|
| Cloud Platform | Amazon Web Services |
| Web Application | PHP, HTML |
| Serverless Computing | AWS Lambda, Python 3.12 |
| File Storage | Amazon S3 |
| Messaging | Amazon SNS |
| Web Server | Apache HTTP Server |
| Operating System | Amazon Linux 2023 |
| SDK & Package Manager | AWS SDK for PHP, Composer |

## 🔄 Workflow

```mermaid
flowchart TD
    A["1. User uploads a file"] --> B["2. PHP application uploads to S3"]
    B --> C["3. S3 generates an upload event"]
    C --> D["4. Lambda reads file metadata"]
    D --> E["5. Lambda publishes to SNS"]
    E --> F["6. SNS sends email notification"]
    D --> G["7. CloudWatch records execution logs"]

    style A fill:#E8F2FF,stroke:#2563EB,color:#111827
    style B fill:#E8F2FF,stroke:#2563EB,color:#111827
    style C fill:#FFF4E5,stroke:#F59E0B,color:#111827
    style D fill:#E6F9ED,stroke:#16A34A,color:#111827
    style E fill:#FFF4E5,stroke:#F59E0B,color:#111827
    style F fill:#E8F2FF,stroke:#2563EB,color:#111827
    style G fill:#F3E8FF,stroke:#9333EA,color:#111827
```

## 📁 Project Structure

```text
AWS-Event-Driven-File-Upload-Notification-System/
│
├── index.html
├── s3upload.php
├── lambda_function.py
├── README.md
├── Task.pdf
└── AWS Event-Driven File Upload Notification System.pdf
```

## 🔐 IAM Security

The project uses IAM roles to grant AWS services the permissions they need, without storing AWS access keys in the application.

| IAM Role | Permissions |
|---|---|
| EC2 Instance Role | `s3:PutObject` |
| Lambda Execution Role | `s3:GetObject`, `sns:Publish` |

## ✨ Key Features

- Automated file upload and storage using Amazon S3.
- Event-driven processing with AWS Lambda.
- Automatic email notifications through Amazon SNS.
- Secure IAM role-based authentication.
- CloudWatch logging for monitoring and troubleshooting.
- Serverless processing without manually managing compute infrastructure for Lambda.

## 📄 Documentation

The complete implementation guide, including commands, configurations, screenshots, and deployment steps, is available below.

📘 [View the Complete Deployment Guide](./AWS%20Event-Driven%20File%20Upload%20Notification%20System.pdf)

## 🎯 Skills Demonstrated

<p align="center">
  <img src="https://skillicons.dev/icons?i=aws,php,python,linux,bash,git" alt="AWS, PHP, Python, Linux, Bash, Git"/>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Event--Driven%20Architecture-2563EB?style=for-the-badge" alt="Event-Driven Architecture"/>
  <img src="https://img.shields.io/badge/Serverless%20Computing-16A34A?style=for-the-badge" alt="Serverless Computing"/>
  <img src="https://img.shields.io/badge/IAM%20Security-232F3E?style=for-the-badge" alt="IAM Security"/>
</p>

## ✅ Project Outcome

Successfully implemented an automated file upload notification system using AWS.

Whenever a user uploads a file through the PHP application, the system automatically stores it in S3, processes the upload event with Lambda, and sends an email notification through SNS.

This project demonstrates practical experience in event-driven architecture, serverless computing, cloud integration, and automated notification workflows.

## 📚 Learning Outcomes

- Building event-driven cloud applications.
- Configuring Amazon S3 event notifications.
- Integrating AWS Lambda with S3 and SNS.
- Managing IAM roles and permissions.
- Monitoring serverless applications with CloudWatch.
- Integrating PHP applications with AWS SDK.
- Building automated workflows using AWS services.

---

<p align="center">
  <b>Built as a hands-on AWS and DevOps learning project.</b>
</p>
