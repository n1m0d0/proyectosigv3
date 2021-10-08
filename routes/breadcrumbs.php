<?php

Breadcrumbs::for('welcome', function ($trail) {
    $trail->push('welcome', route('/'));
});