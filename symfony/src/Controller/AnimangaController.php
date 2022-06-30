<?php

namespace App\Controller;

use OpenApi\Annotations as OA;
use App\Entity\Animanga;
use Nelmio\ApiDocBundle\Annotation\Model;
use App\Repository\AnimangaRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @OA\Tag(name="Animanga")
 */
class AnimangaController extends AbstractController
{
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @Route("/api/animangas", name="Animangas", methods={"GET"})
     * @OA\Response(
     *     response=200,
     *     description="Retourne la liste des Animangas",
     *     @Model(type=Animanga::class)
     * )
     */
    public function index(AnimangaRepository $repository): Response
    {
        $Animangas = $repository->findAll();
        return $this->json($Animangas, 200, [], [
            "groups" => ["animanga"]
        ]);
    }


    /**
     * @Route("/api/animangas/names", name="Animangas_Names", methods={"GET"})
     * @OA\Response(
     *     response=200,
     *     description="Retourne la liste des Noms des Animangas",
     *     @Model(type=Animanga::class, groups={"name"})
     * )
     */
    public function names(AnimangaRepository $repository): Response
    {
        $Animangas = $repository->findAll();
        return $this->json($Animangas, 200, [], [
            "groups" => ["name"]
        ]);
    }
}
