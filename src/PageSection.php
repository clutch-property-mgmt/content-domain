<?php

namespace ClutchPropertyMgmt\ContentDomain;

use Phpolar\Model\AbstractModel;
use Phpolar\Model\Label;
use Phpolar\Model\PrimaryKey;
use Phpolar\Validators\Max;
use Phpolar\Validators\MaxLength;
use Phpolar\Validators\Min;
use Phpolar\Validators\Required;

final class PageSection extends AbstractModel
{
    #[PrimaryKey]
    public int $id;

    #[Required]
    #[Label("Page")]
    public int $page_id;

    #[Required]
    #[MaxLength(100)]
    public string $key;

    #[Required]
    #[MaxLength(200)]
    public string $title;

    #[Required]
    #[MaxLength(2000)]
    public string $body;

    #[Required]
    #[MaxLength(255)]
    #[Label("Image URL")]
    public string $image_url;

    #[Required]
    #[MaxLength(200)]
    #[Label("Image Description")]
    public string $image_description;

    #[Required]
    #[Label("Is Visible")]
    public bool $is_visible;

    #[Required]
    #[Max(10_000)]
    #[Min(0)]
    #[Label("Sort Order")]
    public int $sort_order;
}
