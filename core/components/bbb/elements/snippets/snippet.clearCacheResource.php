<?php
$resource->_contextKey = $resource->context_key;
$cache = $modx->cacheManager->getCacheProvider($modx->getOption('cache_resource_key', null, 'resource'));
$key = $resource->getCacheKey();
$cache->delete($key, array('deleteTop' => true));
$cache->delete($key);
