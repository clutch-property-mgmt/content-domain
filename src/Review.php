<?php

namespace ClutchPropertyMgmt\ContentDomain;

use Phpolar\Model\AbstractModel;
use Phpolar\Model\Hidden;
use Phpolar\Model\Label;
use Phpolar\Model\PrimaryKey;
use Phpolar\Validators\Max;
use Phpolar\Validators\MaxLength;
use Phpolar\Validators\Min;
use Phpolar\Validators\Required;

final class Review extends AbstractModel
{
    #[PrimaryKey]
    #[Hidden]
    public int $id;

    #[Required]
    #[Label("Your name")]
    public string $author;

    #[Max(10)]
    #[Min(1)]
    #[Required]
    public int $rating;

    #[Required]
    #[MaxLength(1200)]
    #[Label("Comments")]
    public string $body;
}
