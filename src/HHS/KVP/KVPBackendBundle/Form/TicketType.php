<?php
/**
 * @author Fabian Jungwirth aka Noxaro
 */

namespace HHS\KVP\KVPBackendBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("content", "text");
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            "data_class" => "HHS\KVP\KVPBackendBundle\Entity\Ticket",
            "csrf_protection" => false
        ));
    }
}