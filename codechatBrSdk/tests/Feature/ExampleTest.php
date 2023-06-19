<?php

uses(Tests\TestCase::class);

test('create a instance on codechatbr', function () {
    $reponse = $this->getJson('/codechat_br/instance/create');
});
