<?php

namespace KitHouseBundle\Controller;

use KitHouseBundle\Entity\HouseAlbumItem;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Housealbumitem controller.
 *
 */
class HouseAlbumItemController extends Controller
{
    /**
     * Lists all houseAlbumItem entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $houseAlbumItems = $em->getRepository('KitHouseBundle:HouseAlbumItem')->findAll();

        return $this->render('housealbumitem/index.html.twig', array(
            'houseAlbumItems' => $houseAlbumItems,
        ));
    }

    /**
     * Creates a new houseAlbumItem entity.
     *
     */
    public function newAction(Request $request)
    {
        $houseAlbumItem = new Housealbumitem();
        $form = $this->createForm('KitHouseBundle\Form\HouseAlbumItemType', $houseAlbumItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($houseAlbumItem);
            $em->flush($houseAlbumItem);

            return $this->redirectToRoute('housealbumitem_show', array('id' => $houseAlbumItem->getId()));
        }

        return $this->render('housealbumitem/new.html.twig', array(
            'houseAlbumItem' => $houseAlbumItem,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a houseAlbumItem entity.
     *
     */
    public function showAction(HouseAlbumItem $houseAlbumItem)
    {
        $deleteForm = $this->createDeleteForm($houseAlbumItem);

        return $this->render('housealbumitem/show.html.twig', array(
            'houseAlbumItem' => $houseAlbumItem,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing houseAlbumItem entity.
     *
     */
    public function editAction(Request $request, HouseAlbumItem $houseAlbumItem)
    {
        $deleteForm = $this->createDeleteForm($houseAlbumItem);
        $editForm = $this->createForm('KitHouseBundle\Form\HouseAlbumItemType', $houseAlbumItem);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('housealbumitem_edit', array('id' => $houseAlbumItem->getId()));
        }

        return $this->render('housealbumitem/edit.html.twig', array(
            'houseAlbumItem' => $houseAlbumItem,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a houseAlbumItem entity.
     *
     */
    public function deleteAction(Request $request, HouseAlbumItem $houseAlbumItem)
    {
        $form = $this->createDeleteForm($houseAlbumItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($houseAlbumItem);
            $em->flush($houseAlbumItem);
        }

        return $this->redirectToRoute('housealbumitem_index');
    }

    /**
     * Creates a form to delete a houseAlbumItem entity.
     *
     * @param HouseAlbumItem $houseAlbumItem The houseAlbumItem entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(HouseAlbumItem $houseAlbumItem)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('housealbumitem_delete', array('id' => $houseAlbumItem->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
