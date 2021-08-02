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

## 🔖 About

CDR Asterisk is a web application written with the codeigniter 4 framework, which allows you to view the details of a call and listen to recordings.

## 🚀 Technologies

- [PHP](https://php.net/)
- [CodeIgniter](https://codeigniter.com/)
- [Sleek](https://sleek.tafcoder.com/)

## 🏁 How to run the project

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

## ℹ️ Info

#### Credentials

- Usuário: admin@admin.com
- Senha: password

## 📄 Changelog

[See here](docs/changelog.md)

## 📝 License

[MIT](LICENSE)

**Free Software, Hell Yeah!**
