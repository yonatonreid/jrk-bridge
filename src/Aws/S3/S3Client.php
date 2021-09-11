<?php

namespace Bridge\Aws\S3;

class S3Client extends \Aws\S3\S3Client
{
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
}