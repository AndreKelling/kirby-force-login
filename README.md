# Force Login

A plugin for [Kirby CMS](https://getkirby.com/docs/reference).

- forces all users to login on non-panel pages
- redirects back to blocked page via urlParam after login

Especially useful for staging websites.

Inspired by [WordPress plugin - Force Login](https://de.wordpress.org/plugins/wp-force-login/)

## Requirements

- Kirby 5.1+ (just tested with 5.1 probably works on previous versions too)

## Installation

### Download

Download and copy this repository to `/site/plugins/kirby-force-login`.

### Composer

```
composer require andrekelling/kirby-force-login
```

## Usage

It's active when the config `andrekelling.force-login.is-active` is set to true in a respective config file. 

For example in `site/config/config.php`.

## License

[MIT License](./LICENSE)
Copyright © 2025 André Kelling
