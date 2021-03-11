# Dumbways Batch 21

[![Build Status](https://travis-ci.org/dwyl/esta.svg?branch=master)](https://github.com/handokoadjipangestu/project-dumbways-300121-test)
[![stability-experimental](https://img.shields.io/badge/stability-experimental-orange.svg)](https://github.com/handokoadjipangestu/project-dumbways-300121-test)
[![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/handokoadjipangestu/project-dumbways-300121-test/fork)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

The project is intended for the Dumbways bootcamp batch 21 selection test on January 30, 2020

1 folder consists of 3 logical source codes and 1 CRUD source code with `native PHP`. For the CRUD section or question number 4 it is made with folder because there are many supporting files to make the website intact and for the query that is instructed is already file name `4.query.txt` in folder 4.

This project was made using native PHP and for appearance it uses a [Bootstrap 4.\*](https://getbootstrap.com/docs/4.0/getting-started/introduction/) framework with [AdminLTE](https://adminlte.io/) template.
.

For those who want to contribute, just fork or download as usual!

## Requirements

- PHP >= 5.3.7
- Of course with the internet

## Installation

Just fork or download it from this repository then copy it to htdocs directory. don't forget to import the existing database in the directory `4/resources/sql` into mysql.

## Usage example

### 1.php (Home Purchase)

![Home Purchase](http://bebaskripsi.000webhostapp.com/project-dumbways-300121-test/1.png)

### 2.php (Count Character)

![Count Character](http://bebaskripsi.000webhostapp.com/project-dumbways-300121-test/2.png)

### 3.php (Hollow Diamond)

![Count Character](http://bebaskripsi.000webhostapp.com/project-dumbways-300121-test/3.png)

### 4 (School)

![Home](http://bebaskripsi.000webhostapp.com/project-dumbways-300121-test/4-home.png)

![Dashboard](http://bebaskripsi.000webhostapp.com/project-dumbways-300121-test/4-dashboard.png)

_For more examples and usage, please contact [Handoko Adji Pangestu](https://www.instagram.com/handokoadjip/)._

## Development setup

In the resources/config directory find the `functions.php` file, then change in line 7 and 9 :

#### line 7

```sh
$database = '2021_project_dumbways';
```

to :

```sh
$database = '{yourDatabaseName}';
```

#### line 9

```sh
$base_url= 'http://localhost/dumbways/4';
```

to :

```sh
$database = '{baseUrl}';
```

## Release History

- 0.0.1
  - Work in progress

## Meta

Handoko Adji Pangestu – [@handokoadjip](https://www.instagram.com/handokoadjip/) – handokoadjipangestu@gmail.com

Distributed under the MIT license. See `LICENSE` for more information.

[https://opensource.org/licenses/MIT](https://opensource.org/licenses/MIT)

## Contributing

1. Fork it (<https://github.com/handokoadjipangestu/project-dumbways-300121-test/fork>)
2. Create your feature branch (`git checkout -b feature/fooBar`)
3. Commit your changes (`git commit -am 'Add some fooBar'`)
4. Push to the branch (`git push origin feature/fooBar`)
5. Create a new Pull Request
