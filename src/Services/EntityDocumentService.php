<?php

declare(strict_types=1);

namespace FundAmerica\Services;

use Exception;
use Illuminate\Http\Client\Response;
use FundAmerica\Resources\EntityDocument;

class EntityDocumentService extends Service
{
    /**
     * @param Response $response
     *
     * @return EntityDocument
     */
    protected function toResource(Response $response): EntityDocument
    {
        return new EntityDocument($response);
    }

    /**
     * @param EntityDocument $document
     *
     * @return array
     * @throws Exception
     */
    public function create(EntityDocument $document): array
    {
        $documents = [];

        foreach ($document->files as $file) {
            $response = $this->client
                ->multipart()
                ->post('entity_documents', [
                    [
                        'name'     => 'file',
                        'contents' => $file->stream,
                        'filename' => $document->name,
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

            $documents[] = $this->toResource($response);
        }

        return $documents;
    }

    /**
     * @return EntityDocument[]
     * @throws Exception
     */
    public function get(): array
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
