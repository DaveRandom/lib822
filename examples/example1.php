<?php

    use \Lib822\MessageParserFactory;
    use \Lib822\HeaderTokenizerFactory;

    require __DIR__ . '/../src/bootstrap.php';

    $messageParser = (new MessageParserFactory)->create();
    $headerTokenizer = (new HeaderTokenizerFactory)->create();

    $data = file_get_contents(__DIR__ . '/example1.msg');

    $message = $messageParser->parseMessage($data);
    
    $contentTypeHeader = $message->getHeader('Content-Type');
    $tokens = $headerTokenizer->tokenizeHeader($contentTypeHeader->item(0));

    echo 'The Content-Type header is "', $contentTypeHeader->item(0), "\"\n",
         'The Content-Type is "', $tokens[0], "\"\n",
         'The MIME boundary is "', $tokens->getNamedParameter('boundary'), '"';