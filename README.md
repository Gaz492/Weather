# Weather

This project was created as a replacement to http://www.osanywhereweather.com/. All images belong to their respective owners

## Installation

* Import database.sql to your MySQL server
* Rename config.php.dist in the include folder to config.php
* Change the MySQL login details as needed

You may also need to change your SQL_MODE to not include only_full_group_by. To do this add the following line to your my.cnf.
Please note that your config may differ from mine. If the below line does not fix the issue please google the issue.
```
[mysqld]
sql_mode = "STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"
```

* Point gateway.weather.oregonscientific.com to your desired location


##Images

![Image1](http://ss.wolf.ski/ss/chrome_2016-09-12_17-08-27.jpg)
![Image2](http://ss.wolf.ski/ss/chrome_2016-09-12_17-08-32.jpg)
![Image3](http://ss.wolf.ski/ss/chrome_2016-09-12_17-08-36.jpg)