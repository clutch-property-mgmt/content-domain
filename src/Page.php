<?php

namespace ClutchPropertyMgmt\ContentDomain;

use Phpolar\Model\AbstractModel;
use Phpolar\Model\PrimaryKey;
use Phpolar\Validators\MaxLength;
use Phpolar\Validators\Required;

final class Page extends AbstractModel
{
    #[PrimaryKey]
    public int $id;
    #[Required]
    #[MaxLength(30)]
    public string $slug;
    #[Required]
    #[MaxLength(150)]
    public string $title;
    /**
     * @var PageSection[] $sections
     */
    public array $sections;
}
