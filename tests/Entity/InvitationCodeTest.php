<?php


namespace App\Tests\Entity;

use App\Entity\InvitationCode;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Liip\TestFixturesBundle\Test\FixturesTrait;


class InvitationCodeTest extends KernelTestCase
{
//    use fixturesTrait;

    public function getEntity(): InvitationCode
    {
        return (new InvitationCode())
            ->setCode('123451')
            ->setDescription('Description de test')
            ->setExpireAt(new \DateTime());
    }


    public function assertHasErrors(InvitationCode $code, $number = 0)
    {
        self::bootKernel();
        $errors = self::$container->get('validator')->validate($code);
        $messages = [];
        /**
         * @var ConstraintViolation $error
         */
        foreach($errors as $error) {
            $messages[] = $error->getPropertyPath() . ' => ' . $error->getMessage();

        }
        $this->assertCount($number, $errors, implode(', ', $messages));
    }


    public function testValidEntity()
    {
        $this->assertHasErrors($this->getEntity(), 0);
    }


    public function testInvalidCodeEntity()
    {
        $this->assertHasErrors($this->getEntity()->setCode('12b45'), 1);
        $this->assertHasErrors($this->getEntity()->setCode('1245'), 1);
    }


    public function testInvalidBlankCodeEntity()
    {
        $this->assertHasErrors($this->getEntity()->setCode(''), 1);
    }


    public function testInvalidUsedCode()
    {
        $this->loadFixtureFiles([dirname(__DIR__) . '/fixtures/invitation_code.yaml']);
        $this->assertHasErrors($this->getEntity()->setCode('54321'), 1);
    }





}