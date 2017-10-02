<?php
namespace AppBundle\Component\Type;

use AppBundle\Util\Constants;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class CalendarEventFormType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('calendarUid', ChoiceType::class, ['label' => 'Calendar', 'choices'  => ['Classes' => Constants::CLASS_CALENDAR_UID]]);
        $builder->add('title', TextType::class);
        $builder->add('description', TextAreaType::class);
        $builder->add('date', DateTimeType::class);
        $builder->add('duration', NumberType::class);
    }

    function getName() {
        return 'CalendarEventFormType';
    }
}