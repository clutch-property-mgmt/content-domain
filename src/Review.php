<?php

namespace ClutchPropertyMgmt\ContentDomain;

use Phpolar\Model\AbstractModel;
use Phpolar\Model\PrimaryKey;
use Phpolar\Validators\Max;
use Phpolar\Validators\MaxLength;
use Phpolar\Validators\Required;

final class Review extends AbstractModel
{
    #[PrimaryKey]
    public int $id;
    #[Required]
    public string $author;
    #[Max(10)]
    #[Max(1)]
    public int $rating;
    #[Required]
    #[MaxLength(1200)]
    public string $body;
}
