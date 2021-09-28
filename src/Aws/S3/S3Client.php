<?php

namespace Bridge\Aws\S3;

use Aws\Result;

class S3Client extends \Aws\S3\S3Client
{
    public function deleteItem(string $bucket, string $key): Result
    {
        return $this -> deleteObject([
            'Bucket' => $bucket,
            'Key' => $key
        ]);
    }

    public function getBucketNames(): array
    {
        $buckets = $this -> listBuckets();
        $fBuckets = [];
        foreach ($buckets['Buckets'] as $bucket) {
            $fBuckets[] = $bucket['Name'];
        }
        return $fBuckets;
    }

    public function getBucketsSimple(): array
    {
        $buckets = $this -> listBuckets();
        $fBuckets = [];
        foreach ($buckets['Buckets'] as $bucket) {
            $fBuckets[] = [
                'name' => $bucket['Name'],
                'creationDate' => $bucket['CreationDate'] -> __toString()
            ];
        }
        return $fBuckets;
    }

    public function create(string $bucketName)
    {
        return $this -> createBucket(['Bucket' => $bucketName]);
    }

    public function uploadFile(string $bucket, string $key, string $filePath, array $metadata = []): Result
    {
        $result = $this -> putObject(array(
            'Bucket' => $bucket,
            'Key' => $key,
            'SourceFile' => $filePath,
            'Metadata' => $metadata
        ));
        $this -> waitUntil('ObjectExists', array(
            'Bucket' => $bucket,
            'Key' => $key
        ));
        return $result;
    }

    public function createContentFile(string $bucket, string $key, string $data, array $metadata = []): Result
    {
        $result = $this -> putObject(array(
            'Bucket' => $bucket,
            'Key' => $key,
            'Body' => $data,
            'Metadata' => $metadata
        ));
        $this -> waitUntil('ObjectExists', array(
            'Bucket' => $bucket,
            'Key' => $key
        ));
        return $result;
    }
}