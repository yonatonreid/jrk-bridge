<?php

namespace Bridge\Aws\Ec2;

class Ec2Client extends \Aws\Ec2\Ec2Client
{
    public function describeInstanceType(string $instanceId, bool $dryRun): \Aws\Result
    {
        return $this -> describeInstanceAttribute([
            'Attribute' => 'instanceType',
            'DryRun' => $dryRun,
            'InstanceId' => $instanceId
        ]);
    }
}