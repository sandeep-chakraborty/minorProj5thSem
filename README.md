# Stock Management System

This is a simple stock management system built using PHP, following the MVC architecture. The system includes admin management, stock management, and sale tracking.

## Table of Contents

- [Installation](#installation)
- [Database Setup](#database-setup)
- [File Structure](#file-structure)
- [Features](#features)
- [Admin Login Credentials](#admin-login-credentials)

## Installation

To install and set up the Stock Management System, follow the steps below:

1. Download the project and place it in your local server's document root (e.g., `htdocs` for XAMPP or `www` for WAMP).
2. Ensure your local server (Apache, MySQL) is running.
3. Navigate to phpMyAdmin to set up the database as described in the [Database Setup](#database-setup) section.
4. Configure the database connection in the `config/` folder.

## Database Setup

To manually set up the database, execute the following SQL queries in phpMyAdmin:

### 1. Create Tables

#### Admin Table
```sql
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ;
```
#### Manage stock table
```sql
DROP TABLE IF EXISTS `managestock`;
CREATE TABLE IF NOT EXISTS `managestock` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sid` varchar(100) NOT NULL,
  `item` varchar(100) NOT NULL,
  `dfrom` varchar(100) NOT NULL,
  `doa` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
);

```
#### Sale table
```sql
DROP TABLE IF EXISTS `sale`;
CREATE TABLE IF NOT EXISTS `sale` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sid` varchar(100) NOT NULL,
  `stock_id` varchar(100),
  `bname` varchar(100) NOT NULL,
  `bshop` varchar(100) NOT NULL,
  `dop` varchar(100) NOT NULL,
  `rqty` varchar(100) NOT NULL,
  `tprice` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `bemail` varchar(100) NOT NULL,
  `baddress` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
);


```
### insert admin credentials
```sql
INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'bcd2024', 'abc111');

```

### insert manage stock data
```sql
INSERT INTO `managestock` (`id`, `sid`, `item`, `dfrom`, `doa`, `qty`, `price`, `description`) VALUES
(7, 'BCD/325', 'HP VICTUS LAPTOP', 'GUWAHATI', '2024-10-22', '8', '72000', 'bh bbh');

```
### insert sale data
```sql
INSERT INTO `managestock` (`id`, `sid`, `item`, `dfrom`, `doa`, `qty`, `price`, `description`) VALUES
(7, 'BCD/325', 'HP VICTUS LAPTOP', 'GUWAHATI', '2024-10-22', '8', '72000', 'bh bbh');

```