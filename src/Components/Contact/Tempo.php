<?php

namespace App\Components\Contact;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent (template:'themes/%env(APP_THEME)%/components/Contact/Tempo.html.twig')]
class Tempo
{
}