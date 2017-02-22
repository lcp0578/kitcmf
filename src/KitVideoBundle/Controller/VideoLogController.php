<?php

namespace KitVideoBundle\Controller;

use KitVideoBundle\Entity\VideoLog;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Videolog controller.
 *
 */
class VideoLogController extends Controller
{
    /**
     * Lists all videoLog entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $videoLogs = $em->getRepository('KitVideoBundle:VideoLog')->findAll();

        return $this->render('videolog/index.html.twig', array(
            'videoLogs' => $videoLogs,
        ));
    }

    /**
     * Creates a new videoLog entity.
     *
     */
    public function newAction(Request $request)
    {
        $videoLog = new Videolog();
        $form = $this->createForm('KitVideoBundle\Form\VideoLogType', $videoLog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($videoLog);
            $em->flush($videoLog);

            return $this->redirectToRoute('videolog_show', array('id' => $videoLog->getId()));
        }

        return $this->render('videolog/new.html.twig', array(
            'videoLog' => $videoLog,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a videoLog entity.
     *
     */
    public function showAction(VideoLog $videoLog)
    {
        $deleteForm = $this->createDeleteForm($videoLog);

        return $this->render('videolog/show.html.twig', array(
            'videoLog' => $videoLog,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing videoLog entity.
     *
     */
    public function editAction(Request $request, VideoLog $videoLog)
    {
        $deleteForm = $this->createDeleteForm($videoLog);
        $editForm = $this->createForm('KitVideoBundle\Form\VideoLogType', $videoLog);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('videolog_edit', array('id' => $videoLog->getId()));
        }

        return $this->render('videolog/edit.html.twig', array(
            'videoLog' => $videoLog,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a videoLog entity.
     *
     */
    public function deleteAction(Request $request, VideoLog $videoLog)
    {
        $form = $this->createDeleteForm($videoLog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($videoLog);
            $em->flush($videoLog);
        }

        return $this->redirectToRoute('videolog_index');
    }

    /**
     * Creates a form to delete a videoLog entity.
     *
     * @param VideoLog $videoLog The videoLog entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(VideoLog $videoLog)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('videolog_delete', array('id' => $videoLog->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
