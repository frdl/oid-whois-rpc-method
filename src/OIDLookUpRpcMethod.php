<?php
namespace frdlweb\Api\Whois\OID;

use frdlweb\Api\Rpc\MethodDiscoverableInterface;
use frdlweb\Api\Rpc\Server;
use stdClass;


use frdlweb\Api\Rpc\DiscoverMethod;

abstract class OIDLookUpRpcMethod extends DiscoverMethod implements MethodDiscoverableInterface
{


 /**
 *  returns the expected JSON-RPC 2.0 Request Parameters Member as JSON-Schema
 *  In this case positional arguments are required with only one element: the OID or the query
 *  @ToDo (in the __invoke Method): - Validate the input parameter, e.g.: /^[0-9\.]+$/
 */
 public function getSpec(): ?\stdClass
    {
        return \json_decode(<<<'JSON'
{
  "$schema": "https://json-schema.org/draft-07/schema#",
  "type": ["array"],
  "minItems": 1,
  "maxItems": 1,
  "items": { "type": ["string"] }
}
JSON
							


							
        );
    }
 
	
	
	
 /**
 *  returns the valid JSON-RPC 2.0 Response Result Member as JSON-Schema
 */	
public function getResultSpec(): ?\stdClass
    {
        return \json_decode('
{
 "$schema": "https://look-up.webfan3.de/plugins/publicPages/095_attachments/download.php?id=oid:1.3.6.1.4.1.37553.8.1.8.1.13878.31765&filename=oid-look-up.json#",
  "type": ["null", "array", "object"],
  "properties": {
  },
  "required" : [],
  "additionalProperties": true
}
'
        );

}
    
    
}
