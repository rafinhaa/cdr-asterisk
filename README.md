<h4 align="center">
    <br><br>
    <p align="center">
      <a href="#-about">About</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
      <a href="#-technologies">Technologies</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
      <a href="#-how-to-run-the-project">Run</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
      <a href="#-info">Info</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
      <a href="#-changelog">Changelog</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
      <a href="#-license">License</a>
  </p>
</h4>

## đ About

CDR Asterisk is a web application written with the codeigniter 4 framework, which allows you to view the details of a call and listen to recordings.
Includes:
- [X] Crud for users
- [X] Crud for groups and permissions
- [X] Internationalization

Next steps:
- [] Improve the dashboard View
- [] Upload photo in profile user

## đ Technologies

- [PHP](https://php.net/)
- [CodeIgniter](https://codeigniter.com/)
- [Sleek](https://sleek.tafcoder.com/)

## đ How to run the project

#### Clone the repository

```bash
git clone https://github.com/rafinhaa/cdr-asterisk.git
cd cdr-asterisk
```

#### Install dependencies

```bash
composer install
```

#### Create and edit env file

```bash
cp env .env
vi .env
```

#### Set permissions to writable folder

```bash
chmod -R 777 writable
```

#### Execute migrations

```bash
php spark migrate -all
```

#### Execute seeders

```bash
php spark db:seed UserSeed
php spark db:seed AuthGroupsSeed
php spark db:seed AuthGroupUsersSeed
php spark db:seed AuthPermissions
php spark db:seed AuthGroupsPermissions
```

#### Create a symbolic link from the audio files

```bash
ln -s /var/spool/asterisk/monitor /var/www/html/cdr-asterisk/public/assets/audios
```

## âšī¸ Info

#### Credentials

- User: admin@admin.com
- Pass: password

## đ Changelog

[See here](docs/changelog.md)

## đ License

[MIT](LICENSE)

**Free Software, Hell Yeah!**
