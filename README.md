## About Patient Experience Tracker Project

The Patient Experience Tracker is an online data collection tool that is intended to capture the Patient Reported Outcome Measures (PROMs) and the Patient Reported Experience Measures (PREMs). The end goal of this project is to facilitate collecting PROM/PREM information and monitoring the health status of patients in order to observe any progress/decline in symptoms and health condition. Currently, if a patient is being monitored by a clinician at Dr. Montelpare's clinic, the patient has to make frequent visits to answer questions and explain their health status and symptoms.This project aims to create a website that allows clinicians to monitor patients with ease by asking them to fill out surveys and update their health status online. Also, when enough data is collected from patients, machine learning algorithms can be applied to detect any common patterns observed within a specific category of patients, which would help clinicians spot possible relationships and derive conclusions

![resized-image-Promo (1)](https://user-images.githubusercontent.com/36388349/115121610-0a2da980-9f8a-11eb-8a0b-228fd82b7588.jpeg)


## Feature of the Patient Expeirence Tracker

-Two kind of Survey will be collected:
* Patient Reported Experience Measurements- PREM
* Patient Reported Outcome Measurements- PROM
* Administrator Registration by root
* Patient Registration Approval by Admin/ root
* Admin can Modify Survey, Add new Survey 
* Admin Approve patient password change request
* Admin can Retrive Patient Filled Survey as CSV file
* Admin can add new medication when needed
* Admin can add new medical condition like IBD, COVID-19 etc.

## Local Development:
### Getting Started

-The Database Should be created through XAMPP Shell:
```diff
! Mysql -u root
! CREATE DATABASE Patient_Experience_Tracker;
```
### Running Server:
After Cloning the project from GitHub, cd to the folder and enter:
```diff
! composer update
! cp .env .example .env(copy .env.example .env for windows)
! php artisan migrate
! php artisan db:seed --class=DB_Seed
! composer dump-autoload
! php artisan serve
#### Keep the terminal open and go to local host at: 127.0.0.1

### Installing Composer:
    https://getcomposer.org/doc/00-intro.md
