<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class ExceptionSubscriber implements EventSubscriberInterface
{
    public function __construct(protected LoggerInterface $logger)
    {
    }

    /**
     * Use `console debug:event-dispatcher kernel.exception` command to check
     * if underlying listeners are in correct priority orders.
     *
     * {@inheritdoc}
     */
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::EXCEPTION => [
                ['handleException', 100],
            ],
        ];
    }

    public function handleException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        $this->logger->critical((string) $exception);
    }
}
