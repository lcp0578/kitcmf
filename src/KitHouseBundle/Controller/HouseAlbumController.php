<?php

namespace KitHouseBundle\Controller;

use KitHouseBundle\Entity\HouseAlbum;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Housealbum controller.
 *
 */
class HouseAlbumController extends Controller
{
    /**
     * Lists all houseAlbum entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $houseAlbums = $em->getRepository('KitHouseBundle:HouseAlbum')->findAll();

        return $this->render('housealbum/index.html.twig', array(
            'houseAlbums' => $houseAlbums,
        ));
    }

    /**
     * Creates a new houseAlbum entity.
     *
     */
    public function newAction(Request $request)
    {
        $houseAlbum = new Housealbum();
        $form = $this->createForm('KitHouseBundle\Form\HouseAlbumType', $houseAlbum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($houseAlbum);
            $em->flush($houseAlbum);

            return $this->redirectToRoute('house_show', array('id' => $houseAlbum->getId()));
        }

        return $this->render('housealbum/new.html.twig', array(
            'houseAlbum' => $houseAlbum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a houseAlbum entity.
     *
     */
    public function showAction(HouseAlbum $houseAlbum)
    {
        $deleteForm = $this->createDeleteForm($houseAlbum);

        return $this->render('housealbum/show.html.twig', array(
            'houseAlbum' => $houseAlbum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing houseAlbum entity.
     *
     */
    public function editAction(Request $request, HouseAlbum $houseAlbum)
    {
        $deleteForm = $this->createDeleteForm($houseAlbum);
        $editForm = $this->createForm('KitHouseBundle\Form\HouseAlbumType', $houseAlbum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('house_edit', array('id' => $houseAlbum->getId()));
        }

        return $this->render('housealbum/edit.html.twig', array(
            'houseAlbum' => $houseAlbum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a houseAlbum entity.
     *
     */
    public function deleteAction(Request $request, HouseAlbum $houseAlbum)
    {
        $form = $this->createDeleteForm($houseAlbum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($houseAlbum);
            $em->flush($houseAlbum);
        }

        return $this->redirectToRoute('house_index');
    }

    /**
     * Creates a form to delete a houseAlbum entity.
     *
     * @param HouseAlbum $houseAlbum The houseAlbum entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(HouseAlbum $houseAlbum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('house_delete', array('id' => $houseAlbum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
