<?php

namespace ClutchPropertyMgmt\ContentDomain;

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
