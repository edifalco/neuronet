#!/bin/bash

#Get the date YYYY_mm_dd
now=`date +"%d_%m_%Y"`

#Dump the KB Neuronet DB, gzip it, and uploaded to AWS
mysqldump --all-databases --master-data | pigz | /usr/local/bin/aws s3 cp - s3://neuronet-backup/neuronet_db_$now.sql.gz
