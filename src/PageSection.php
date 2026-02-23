<?php

namespace ClutchPropertyMgmt\ContentDomain;

use Phpolar\Model\AbstractModel;
use Phpolar\Model\PrimaryKey;
use Phpolar\Validators\MaxLength;
use Phpolar\Validators\Required;

final class PageSection extends AbstractModel
{
    #[PrimaryKey]
    public int $id;
    #[Required]
    public int $page_id;
    #[Required]
    #[MaxLength(100)]
    public string $key;
    #[Required]
    #[MaxLength(150)]
    public string $title;
    #[Required]
    #[MaxLength(1200)]
    public string $body;
    #[Required]
    #[MaxLength(150)]
    public string $image_url;
    #[Required]
    #[MaxLength(150)]
    public string $image_description;
    #[Required]
    public bool $is_visible;
    public int $sort_order;
}
