<?php

namespace ClutchPropertyMgmt\StoreFront;

final class Page
{
    public int $id;
    public string $slug;
    public string $title;
    /**
     * @var PageSection[] $sections
     */
    public array $sections;
}
