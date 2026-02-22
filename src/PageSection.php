<?php

namespace ClutchPropertyMgmt\ContentDomain;

final class PageSection
{
    public int $id;
    public int $page_id;
    public string $key;
    public string $title;
    public string $body;
    public string $image_url;
    public string $image_description;
    public bool $is_visible;
    public int $sort_order;
}
