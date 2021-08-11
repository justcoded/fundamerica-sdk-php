<?php

declare(strict_types=1);

namespace FundAmerica\Services;

use FundAmerica\Exceptions\FundAmericaHttpException;
use GuzzleHttp\Exception\GuzzleException;
use FundAmerica\Resources\EntityDocument;
use Illuminate\Support\Arr;
use LenderKit\Services\MimeType\MimeType;

class EntityDocumentService extends Service
{
    /**
     * @param $response
     *
     * @return EntityDocument
     */
    protected function toResource($response): EntityDocument
    {
        return new EntityDocument($response);
    }

    /**
     * @param EntityDocument $document
     *
     * @return array
     * @throws GuzzleException
     */
    public function create(EntityDocument $document): array
    {
        $documents = [];

        foreach ($document->files as $file) {
            $response = $this->client->multipart('POST', 'entity_documents', [
                [
                    'name'     => 'file',
                    'contents' => $file->stream,
                    'filename' => $document->title . '.' . Arr::first(MimeType::getExtensions($file->content_type)),
                ],
                [
                    'name'     => 'content_type',
                    'contents' => $file->content_type,
                ],
                [
                    'name'     => 'title',
                    'contents' => $document->title,
                ],
                [
                    'name'     => 'description',
                    'contents' => $document->description,
                ],
                [
                    'name'     => 'entity_id',
                    'contents' => $document->entity_id,
                ],
                [
                    'name'     => 'purpose',
                    'contents' => $document->purpose,
                ],
            ]);

            $documents[] = $this->toResource($response->getBody()->getContents());
        }

        return $documents;
    }

    /**
     * @return array
     * @throws GuzzleException
     * @throws FundAmericaHttpException
     */
    public function all(): array
    {
        $response = $this->client->get('entity_documents');
        if (is_string($response)) {
            $response = json_decode($response);
        }

        $entities = [];
        foreach ($response as $item) {
            $entities = $this->toResource($item);
        }

        return $entities;
    }
}
