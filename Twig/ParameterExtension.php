<?php

namespace WH\ParameterBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface as Container;

/**
 * Class ParameterExtension
 *
 * @package WH\ParameterBundle\Twig
 */
class ParameterExtension extends \Twig_Extension
{

    private $container;

    private $parameters = array();

    /**
     * ParameterExtension constructor.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;

        $em = $this->container->get('doctrine')->getManager();
        $parameters = $em->getRepository('WHParameterBundle:Parameter')->get(
            'all'
        );
        foreach ($parameters as $parameter) {
            $this->parameters[$parameter->getSlug()] = $parameter;
        }
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('getParameter', array($this, 'getParameter')),
        );
    }

    /**
     * @param $slug
     *
     * @return null|string
     */
    public function getParameter($slug)
    {
        $parameter = null;

        if (!empty($this->parameters[$slug])) {
            $parameter = $this->parameters[$slug];
        }

        if (!$parameter) {
            return 'Paramètre manquant : ' . $slug;
        }

        switch ($parameter->getType()) {

            case 'string':
                return $parameter->getValueString();
                break;

            case 'text':
                return $parameter->getValueText();
                break;

            case 'internal-link':
                return $this->container->get('router')->generate(
                    'ft_wh_seo_router_dispatch',
                    array(
                        'url' => $parameter->getValueLink(),
                    )
                );
                break;

            case 'external-link':
                return $parameter->getValueLink();
                break;

            case 'image':
                if ($parameter->getImage() && $parameter->getImage()->getUrl()) {
                    return $this->container->getParameter('media.baseurl') . $parameter->getImage()->getUrl();
                }
                break;
        }

        return null;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'parameter';
    }

}
