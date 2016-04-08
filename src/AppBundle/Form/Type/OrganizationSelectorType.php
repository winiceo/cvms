<?php

namespace AppBundle\Form\Type;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;


/**
 * Select a organization
 *
 */
class OrganizationSelectorType extends AbstractType
{
    /**
     * @var PropertyAccessorInterface
     */
    protected $propertyAccessor;
    
    public function __construct(PropertyAccessorInterface $propertyAccessor = null)
    {
        $this->propertyAccessor = $propertyAccessor ?: PropertyAccess::createPropertyAccessor();
    }
    
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $levelPrefix = $options['levelPrefix'];
    
        if (empty($levelPrefix)) {
            return;
        }        
    
        foreach ($view->vars['choices'] as $choice) {
            $dataObject = $choice->data;
            $level = $this->propertyAccessor->getValue($dataObject, $options['treeLevelField']);
            $choice->label = str_repeat($levelPrefix, $level) . $choice->label;
        }
    
        if (is_string($levelPrefix) && !empty($options['prefixAttributeName'])) {
            $view->vars['attr'][$options['prefixAttributeName']] = $levelPrefix;
        }
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $queryBuilder = function (Options $options) {
            return function (EntityRepository $repository) use ($options) {
                $qb = $repository->createQueryBuilder('a');
                foreach ($options['orderFields'] as $columnName => $order) {
                    $qb->addOrderBy(sprintf('a.%s', $columnName), $order);
                }
                return $qb;
            };
        };
    
        $resolver->setDefaults(array(
            'query_builder' => $queryBuilder,
            'expanded' => false,
            'levelPrefix' => '-',
            'orderFields' => array('lft' => 'asc'),
            'prefixAttributeName' => 'data-level-prefix',
            'treeLevelField' => 'lvl',
        ));
    
        $resolver->setAllowedTypes(array(
            'levelPrefix' => array('string', 'callable'),
            'orderFields' => 'array',
            'prefixAttributeName' => array('string', 'null'),
            'treeLevelField' => 'string',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        if (!$resolver instanceof OptionsResolver) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Custom resolver "%s" must extend "Symfony\Component\OptionsResolver\OptionsResolver".',
                    get_class($resolver)
                )
            );
        }
        $this->configureOptions($resolver);
    }

    /**
     * {@inheritDoc}
     */
    public function getParent()
    {
        return 'entity';
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'cvms_organization_selector';
    }
}
