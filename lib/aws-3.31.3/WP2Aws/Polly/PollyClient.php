<?php
namespace WP2Aws\Polly;

use WP2Aws\Api\Serializer\JsonBody;
use WP2Aws\WP2AwsClient;
use WP2Aws\Signature\SignatureV4;
use WP2GuzzleHttp\Psr7\Request;
use WP2GuzzleHttp\Psr7\Uri;
use WP2GuzzleHttp\Psr7;

/**
 * This client is used to interact with the **Amazon Polly** service.
 * @method \WP2Aws\Result deleteLexicon(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteLexiconAsync(array $args = [])
 * @method \WP2Aws\Result describeVoices(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeVoicesAsync(array $args = [])
 * @method \WP2Aws\Result getLexicon(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getLexiconAsync(array $args = [])
 * @method \WP2Aws\Result listLexicons(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listLexiconsAsync(array $args = [])
 * @method \WP2Aws\Result putLexicon(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putLexiconAsync(array $args = [])
 * @method \WP2Aws\Result synthesizeSpeech(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise synthesizeSpeechAsync(array $args = [])
 */
class PollyClient extends WP2AwsClient
{
    /** @var JsonBody */
    private $formatter;

    /**
     * Create a pre-signed URL for Polly operation `SynthesizeSpeech`
     *
     * @param array $args parameters array for `SynthesizeSpeech`
     *                    More information @see WP2Aws\Polly\PollyClient::SynthesizeSpeech
     *
     * @return string
     */
    public function createSynthesizeSpeechPreSignedUrl(array $args)
    {
        $uri = new Uri($this->getEndpoint());
        $uri = $uri->withPath('/v1/speech');

        // Formatting parameters follows rest-json protocol
        $this->formatter = $this->formatter ?: new JsonBody($this->getApi());
        $queryArray = json_decode(
            $this->formatter->build(
                $this->getApi()->getOperation('SynthesizeSpeech')->getInput(),
                $args
            ),
            true
        );

        // Mocking a 'GET' request in pre-signing the Url
        $query = Psr7\build_query($queryArray);
        $uri = $uri->withQuery($query);

        $request = new Request('GET', $uri);
        $request = $request->withBody(Psr7\stream_for(''));
        $signer = new SignatureV4('polly', $this->getRegion());
        return (string) $signer->presign(
            $request,
            $this->getCredentials()->wait(),
            '+15 minutes'
        )->getUri();
    }
}
