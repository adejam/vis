# Communivis

> Communivis is a user identification System via vehicle license number. The systema aims to identify the owner of a vehicle in particular community via their vehicle license number.

![screenshot](./app_screenshot.png)

A user is able to create a community and add or verify vehicles and their owners to the community. This allows the user to be able to identify a vehicle owner via the vehicle license number when the need arises.

## FEATURES
The features of the system includes;
- A user can add, edit or delete communities and become the main admin of the community.
- A community admin can add, edit, delete a vehicle and its owner to the community.
- A community admin can add other admins and give them roles such as the ability to
    - Add/Verify a vehicle user
    - Remove a vehicle and its user
    - Add other admins
    - Identify a vehicle owner
    - Edit admin roles
    - Remove an admin
- A user can add their vehicle informations to the system and send a request to communities to register the vehicle with the communities.

## Built With

- HTML
- CSS
- Javascript
- Laravel
- Laravel livewire
- Laravel fortify
- Laravel Jetstream
- Tailwind
- Cloudinary
- Sendgrid
- Heroku
- Clear DB (heroku addon)

## Live Demo

[Development stage Link](http://communivis-staging.herokuapp.com/)

### Development (Running locally)

- Clone the project

```bash
git clone https://github.com/adejam/vis.git

```

- Install Dependencies

```bash
npm install
```

```bash
composer require
```

- Compiles and hot-reloads for development

```
php artisan serve
```

- To check for errors on PHP

```bash
composer phpcs
```

- and to have it actually fix (to the best of its ability) any format issues, run:

```bash
composer phpcbf
```

- Lints and fixes files(CSS|Js|)

```
npm run lint
```

- You can also check against Prettier(html,js,json,md,json,yaml,yml,jsx):

```bash
npm run format:check
```

- and to have it actually fix (to the best of its ability) any format issues, run:

```bash
npm run format
```

## Style Guides

- [CSS Style Guide](http://udacity.github.io/frontend-nanodegree-styleguide/css.html)
- [HTML Style Guide](http://udacity.github.io/frontend-nanodegree-styleguide/index.html)
- [JavaScript Style Guide](http://udacity.github.io/frontend-nanodegree-styleguide/javascript.html)
- [Git Style Guide](https://udacity.github.io/git-styleguide/)
- [PHP Style Guide](https://pear.php.net/manual/en/standards.php)

## 👤 Author

- Github: [@adejam](http://github.com/adejam)
- Twitter: [@adeleye_oj](https://twitter.com/Adeleye_oj)
- LinkedIn: [@adeleye-jamiu](https://linkedin.com/in/adeleye-jamiu)

## 🤝 Contributing

Contributions, issues and feature requests are welcome!

Feel free to check the [issues page](../../issues).

## Show your support

Give a ⭐️ if you like this project!

## Acknowledgments

- [Laravel](https://laravel.com/)

## 📝 License

[MIT licensed](./LICENSE).
