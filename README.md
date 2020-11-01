
<p align="center"><a href="https://remote-jobs-laravel.herokuapp.com/" target="_blank"><img src="https://ucarecdn.com/fd6efffd-6925-477c-b361-85bca373fb84/-/resize/600x/" width="600"></a></p>

<p align="center">
<a href="#"><img src="https://github.com/mostafabahri/remote-jobs/workflows/tests/badge.svg" alt="Tests Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Remote jobs
This is a full-stack web-app demonstrating various laravel features. 
Built with the amazing **TALL** stack (TailwindCSS, AlpineJS, Laravel, Livewire).

You can add new jobs and pay for it, browse through existing ones and optionally subscribe to the newsletter for new jobs.
No registration is needed, we follow up on email with instructions on how to access your listing and payment information.

The app is basically a clone of _weworkremotely.com_. I wanted to try out TALL with more than just a todo app but not get tangled-up in ui design so I made this project.
## Overview

- [x] Browse available jobs
- [x] Post a new job
- [x] Preview your listing before payment
- [x] Uploads images to self-hosted S3 (minio)
- [x] Integrated with Stripe for checkout
- [x] Real-time search with Livewire 
- [x] Unit and feature tested
- [ ] Markdown support for job description
- [ ] Email subscription

## Requirements
- ^ PHP 7.4
- Composer
- Node


## Development Setup

```bash
# install php dependencies 
composer install

# install node dependencies
npm install

# serve with hot reload on localhost:3000
npm run stack:watch
```

## Production Build
```bash
# build laravel-mix assets
npm run production
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
