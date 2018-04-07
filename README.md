#_FinCoopApp_

is a simple

# Installation steps
---

### 1. Download an install repo
	
```
	$ git clone [repository]
	$ cd [repository_folder]
	$ php composer install
```
	
### 2. update fuel/app/config/developpement/db.php to match your env.


### 3. Remove fuel/app/config/developpement/migrations.php log
	
```
	$ rm fuel/app/config/developpement/migrations.php
```
	
### 4. Update DB schema and predefine refences

- Add Sessions Table
- Add simpleauth tables
- Add Project tables
- Seed references data
- Seed Admin profile [username]:Banking2018

```
	$ php oil r session:create
	$ php oil r migrate packages=auth
	$ php oil r migrate
	$ php oil r seeddata:companies
	$ php oil r seeddata:categories
	$ php oil r seeddata:jobtitles
	$ php oil r seeddata:accounts
	$ php oil r seeddata:admins [ADMIN_USERNAME]
```

### 5. lauch Server and visit the project page


#FuelPHP

* Version: 1.8
* [Website](http://fuelphp.com/)
* [Release Documentation](http://docs.fuelphp.com)
* [Release API browser](http://api.fuelphp.com)
* [Development branch Documentation](http://dev-docs.fuelphp.com)
* [Development branch API browser](http://dev-api.fuelphp.com)
* [Support Forum](http://fuelphp.com/forums) for comments, discussion and community support

## Description

FuelPHP is a fast, lightweight PHP 5.3+ framework. In an age where frameworks are a dime a dozen, We believe that FuelPHP will stand out in the crowd.  It will do this by combining all the things you love about the great frameworks out there, while getting rid of the bad.

FuelPHP is fully PHP 7 compatible.

## More information

For more detailed information, see the [development wiki](https://github.com/fuelphp/fuelphp/wiki).

##Development Team

* Harro Verton - Project Manager, Developer ([http://wanwizard.eu/](http://wanwizard.eu/))
* Steve West - Core Developer, ORM
* Márk Sági-Kazár - Developer

### Want to join?

The FuelPHP development team is always looking for new team members, who are willing
to help lift the framework to the next level, and have the commitment to not only
produce awesome code, but also great documentation, and support to our users.

You can not apply for membership. Start by sending in pull-requests, work on outstanding
feature requests or bugs, and become active in the #fuelphp IRC channel. If your skills
are up to scratch, we will notice you, and will ask you to become a team member.

### Alumni

* Frank de Jonge - Developer ([http://frenky.net/](http://frenky.net/))
* Jelmer Schreuder - Developer ([http://jelmerschreuder.nl/](http://jelmerschreuder.nl/))
* Phil Sturgeon - Developer ([http://philsturgeon.co.uk](http://philsturgeon.co.uk))
* Dan Horrigan - Founder, Developer ([http://dhorrigan.com](http://dhorrigan.com))
