<?php

declare(strict_types=1);

namespace Bone\NativeApi;

use Bone\Http\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class DemoApiController
{
    public function listings(ServerRequestInterface $request): ResponseInterface
    {
        $body = [
            [
                'id' => '201',
                'title' => 'The Black Pig',
                'images' => [
                    '0' => [
                        'url' => 'https://img.freepik.com/premium-photo/pirate-ship-stormy-sea_667573-28.jpg',
                    ],
                ],
                'price' => '15000',
                'categoryId' => '5',
                'userId' => '1',
                'location' => [
                    'latitude' => '37.78825',
                    'longitude' => '-122.4324',
                ],
            ], [
                'id' => '3',
                'title' => 'Bone Framework Flag',
                'images' => [
                    '0' => [
                        'url' => 'https://www.theflagshop.co.uk/pub/media/catalog/product/cache/1aa45e34d8351bef7860daeb50e7952c/s/k/skull-bandana-flag-std_1.jpg',
                    ],
                ],
                'categoryId' => '1',
                'price' => '15',
                'userId' => '2',
                'location' => [
                    'latitude' => '37.78825',
                    'longitude' => '-122.4324',
                ],
            ], [
                'id' => '1',
                'title' => 'Retro computer game',
                'description' => 'I\'m selling my furniture at a discount price. Pick up at Venice. DM me asap.',
                'images' => [
                    '0' => [
                        'url' => 'https://static.wikia.nocookie.net/monkeyisland/images/1/16/Stan_vessels.gif/revision/latest?cb=20120508160429',
                    ],
                ],
                'price' => '1000',
                'categoryId' => '1',
                'userId' => '1',
                'location' => [
                    'latitude' => '37.78825',
                    'longitude' => '-122.4324',
                ],
            ], [
                'id' => '2',
                'title' => 'Box office franchise',
                'images' => [
                    '0' => [
                        'url' => 'https://www.slashfilm.com/img/gallery/pirates-of-the-caribbeans-writer-originally-had-a-very-different-star-in-mind-for-jack-sparrow/intro-1659627032.webp',
                    ],
                ],
                'categoryId' => '5',
                'price' => '100',
                'userId' => '2',
                'location' => [
                    'latitude' => '37.78825',
                    'longitude' => '-122.4324',
                ],
            ], [
                'id' => '102',
                'title' => 'Canon 400D (Great Condition)',
                'images' => [
                    '0' => [
                        'fileName' => 'camera1',
                    ],
                ],
                'price' => '300',
                'categoryId' => '3',
                'userId' => '1',
                'location' => [
                    'latitude' => '37.78825',
                    'longitude' => '-122.4324',
                ],
            ], [
                'id' => '101',
                'title' => 'Nikon D850 for sale',
                'images' => [
                    '0' => [
                        'fileName' => 'camera2',
                    ],
                ],
                'price' => '350',
                'categoryId' => '3',
                'userId' => '1',
                'location' => [
                    'latitude' => '37.78825',
                    'longitude' => '-122.4324',
                ],
            ], [
                'id' => '4',
                'title' => 'Sectional couch - Delivery available',
                'description' => 'No rips no stains no odors',
                'images' => [
                    '0' => [
                        'fileName' => 'couch3',
                    ],
                ],
                'categoryId' => '1',
                'price' => '950',
                'userId' => '2',
                'location' => [
                    'latitude' => '37.78825',
                    'longitude' => '-122.4324',
                ],
            ], [
                'id' => '6',
                'title' => 'Brown leather shoes',
                'images' => [
                    '0' => [
                        'fileName' => 'shoes2',
                    ],
                ],
                'categoryId' => '5',
                'price' => '50',
                'userId' => '2',
                'location' => [
                    'latitude' => '37.78825',
                    'longitude' => '-122.4324',
                ],
            ],
        ];

        return new JsonResponse($body);
    }

    public function addListing(ServerRequestInterface $request): ResponseInterface
    {
        // this is just example, we normally would validate and create an entity
        return new JsonResponse($request->getParsedBody());
    }
}
