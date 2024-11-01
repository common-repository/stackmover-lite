=== StackMover Lite ===
Contributors: stackmover
Donate link: https://www.stackmover.com
Tags: Amazon LightSail, Amazon S3, AWS, Backup, Cloud, Migration
Requires at least: 3.0.1
Tested up to: 4.8.2
Requires PHP: 5.6
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Migrate your site onto a Amazon LightSail instance. Backup wordpress and database to S3 and setup a new LightSail instance with just single click.

== Description ==

StackMover is a migrator tool that can backup your wordpress to Amazon S3 and setup an Amazon LightSail instance with the backup data. StackMover can be used to setup a clone wordpress from a live production site onto an Amazon LightSail instance rapidly. This plugin eliminates the need to do the manual steps involved during migration and allows for quick cloning and backup. The clone can either be used for development purpose or to evaluate LightSail.

Stackmover allows for creation of AWS keys securely using AWS CloudFormation template and builds a compressed zip bundle containing all wordpress assets and a database dump. The zip bundle is moved to the input S3 bucket and a new LightSail instance is launched. The new LightSail instance is setup with a LEMP stack (Linux, Nginx, Mysql, Php) and wordpress setup with the data from S3 during instance bootup. 

Stackmover backup creates two files in the chosen S3 bucket. A zipped file containing the metadata of files being migrated (size,timestamp etc) and a single zip file containing the entire wordpress data (themes, plugins, mysql dump etc). The location of these files are timestamped and namespaced according to the input tags. The files would be located inside mybucket/stackmover/mytag/backup/YYYY-MM-DD-Timestamp/ subdirectory of the chosen S3 bucket.

For issues, email support is offered via support@stackmover.com or by creating support tickets in wordpress forum. Pro (paid) version is still under development and we are seeking feature requests.

Features (Lite) :
1. Clone your wordpress onto Amazon LightSail
2. Setup LEMP stack on AWS easily (Linux + Nginx + Mysql + Php)
3. Create IAM user keys using AWS CloudFormation
4. Supports Multipart upload to Amazon S3
5. Full Backup using compressed zip to reduce transfer cost

Limitations:
   * Current version does not support multisite wordpress
   * Source wordpress needs to be running on Linux/Mac [Windows not available currently]
   * Restoring an older version from backup is a manual process


== Installation ==

1. Upload StackMover plugin dir to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= How is the backup data created? =
A zip bundle is created locally containing the zip of all the wordpress data along with a dump of database (using mysqldump). The bundle consists of a zip file and a csv file containing metadata about individual files and their sizes that will be used during restore process.

= How is the data moved to Amazon S3? =
The zip file and the metadata file is copied to the given input S3 bucket and stored in the directory structure below.
*MyS3Bucket/stackmover/MyTag/backup/YYYY-MM-DD-EPOCH*
MyS3Bucket is the input bucket and MyTag is the input tag (for namespacing files). Multipart upload to S3 is used when zip file is greater than 100MB.

= How do I know what files are in the backup file? =
The metadata file in csv format contains all the files in the backed up file in S3. The format is 
*filename,uncompressed_len,compressed_len,lastmod,content_path,offset*

= How is Amazon LightSail cloned with wordpress data? =
Amazon LightSail instances is started on an Ubuntu OS using the AWS keys provided. During bootup, user-data scripts are used to setup the necessary packages (Nginx, Mysql etc) and data downloaded from S3 onto the instance. A new wordpress is installed and data restored from the zip file. The metadata file in the S3 is used to reconcile the individual files in zip bundle. Database is restored using mysqldump file.

= Can I shutdown Amazon LightSail instance via plugin? =
No. You need to login to AWS Console and terminate the LightSail instance. 

= How do I change the LightSail plan of a running instance?  =
Please refer to https://aws.amazon.com/premiumsupport/knowledge-center/change-lightsail-plan/. Process includes creating a snapshot and relaunching a new instance with new plan.

== Screenshots ==

1. Creating AWS Secret/Access Keys securely using AWS CloudFormation.
2. Launching the template to create AWS Keys
3. Select an existing S3 bucket or create a new S3 bucket
4. Click Next to proceed
5. Acknowledging IAM Role creation 
6. Waiting for Stack creation
7. Validation of AWS keys inside StackMover plugin
8. Choosing files to transfer
9. Search and Replace in the destination database running on LightSail
10. Select LightSail plan 
11. Migrate via single click!

== Acknowledgements ==

We would like to acknowledge and thank the open source code and libraries that have been either used as-is or modified under their open source licensing terms. Please see https://www.stackmover.com/acknowledgement.html


== Changelog ==

= 1.0.0 =
* First stable version

== Upgrade Notice ==
= 1.0.0 =
First version launched
