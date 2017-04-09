[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mustafah15/blog/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mustafah15/blog/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/mustafah15/blog/badges/build.png?b=master)](https://scrutinizer-ci.com/g/mustafah15/blog/build-status/master)
# Clean Blog

A Clean Code Designed Blog  

## Architecture

The Architecture we followed to design the application

```
	\App\Contracts
```
Interfaces Used in Application


```
	\App\Repositories
```
Repositories and Repository Base Class to handle interaction with database instead of using regular ORM that laravel introduce.

```
	\App\Managers
```
Manager Classes to handel Application Logic


```
	\App\Traits
```
Traits created and used in Application

