<?php

namespace App\Domain\Entities;

use App\Domain\Contracts\ExternalPageInterface;
use ArrayAccess;
use JsonSerializable;
use InvalidArgumentException;

class ExternalPage implements ExternalPageInterface, ArrayAccess, JsonSerializable
{
    private int $id;
    private string $slug;
    private string $title;
    private string $content;
    private array $acf;
    private array $featured_media;

    /**
     * ExternalPage constructor.
     *
     * @param array $data
     * @throws InvalidArgumentException
     */
    public function __construct(array $data)
    {
        if (!isset($data['id'])) {
            throw new InvalidArgumentException("Missing required parameter: id");
        }
        if (!is_numeric($data['id'])) {
            throw new InvalidArgumentException("Parameter 'id' must be numeric");
        }

        $this->id = (int) $data['id'];
        $this->slug = isset($data['slug']) && is_string($data['slug']) ? $data['slug'] : '';
        $this->title = isset($data['title']['rendered']) && is_array($data['title']) ? $data['title']['rendered'] : '';
        $this->content = isset($data['content']['rendered']) && is_array($data['content']) ? $data['content']['rendered'] : '';
        $this->acf = isset($data['acf']) && is_array($data['acf']) ? $data['acf'] : [];
        $this->featured_media = isset($data['_embedded']['wp:featuredmedia']) && is_array($data['_embedded']['wp:featuredmedia']) ? $data['_embedded']['wp:featuredmedia'] : [];
        // $this->rawData = $data;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return array
     */
    public function getAcf(): array
    {
        return $this->acf;
    }

    /**
     * @return array
     */
    public function getFeaturedMedia(): array
    {
        return $this->featured_media;
    }

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'slug' => $this->getSlug(),
            'title' => $this->getTitle(),
            'content' => $this->getContent(),
            'acf' => $this->getAcf(),
            'featured_media' => $this->getFeaturedMedia(),
        ];
    }

    /**
     * Specify data which should be serialized to JSON.
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    // --- ArrayAccess Implementation ---

    public function offsetExists(mixed $offset): bool
    {
        return in_array($offset, ['id', 'acf'], true) || isset($this->rawData[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return match ($offset) {
            'id' => $this->getId(),
            'slug' => $this->getSlug(),
            'title' => $this->getTitle(),
            'content' => $this->getContent(),
            'acf' => $this->getAcf(),
            'featured_media' => $this->getFeaturedMedia(),
            // default => $this->rawData[$offset] ?? null,
        };
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new \BadMethodCallException("ExternalPage entity is read-only.");
    }

    public function offsetUnset(mixed $offset): void
    {
        throw new \BadMethodCallException("ExternalPage entity is read-only.");
    }
}
