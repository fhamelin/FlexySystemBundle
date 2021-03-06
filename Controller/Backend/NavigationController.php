<?php

namespace Flexy\SystemBundle\Controller\Backend;

use Flexy\SystemBundle\Entity\AppRepository;
use Flexy\SystemBundle\Entity\NavigationRepository;
use Symfony\Component\HttpFoundation\Response;

use Flexy\SystemBundle\Lib\Backend\BaseController;
use Flexy\SystemBundle\Entity\MappingRepository;
use Flexy\SystemBundle\Entity\Section;
use Flexy\SystemBundle\Entity\SectionRepository;

/**
 * Navigation Controller
 */
class NavigationController extends BaseController
{
    /**
     * @var SectionRepository
     */
    protected $sectionRepository;

    /**
     * @var MappingRepository
     */
    protected $mappingRepository;

    /**
     * Init
     */
    public function init()
    {
        $this->sectionRepository = $this->getEm()->getRepository('FlexySystemBundle:Section');
        $this->mappingRepository = $this->getEm()->getRepository('FlexySystemBundle:Mapping');
    }

    /**
     * Section Bar Action
     *
     * @return Response
     */
    public function sectionBarAction()
    {
        $sectionCurrent = $this->getSection();

        if (false == $sectionCurrent) {
            $sectionCurrent = new Section();
        }

        $sections = $this->sectionRepository->findByAppJoinChildren($this->getApp());

        // Cleanup of level 1 sections
        foreach ($sections as $key => $section) {
            if ($section->getParent()) {
                unset($sections[$key]);
            }
        }

        $navigationBuilder = $this->get('flexy_system.navigation_builder');
        $navigationBuilder->setElements($sections);
        $navigationBuilder->setSelectedElement($sectionCurrent);
        $navigationBuilder->build();

        $sections = $navigationBuilder->getElements();

        $sections = $this->get('flexy_system.section_filter')->filterSections($sections);

        return $this->render('FlexySystemBundle:Backend/Navigation:section_bar.html.twig', array(
            'sections' => $sections,
            'sectionCurrent' => $sectionCurrent,
            'managedApp' => $this->getApp()
        ));
    }

    /**
     * Global Bundle Bar Action
     *
     * @return Response
     */
    public function globalModuleBarAction()
    {
        $mappings = $this->mappingRepository->findBy(array('navigation' => NavigationRepository::GLOBAL_MODULE_BAR_ID), array('ordering' => 'ASC'));

        return $this->render('FlexySystemBundle:Backend/Navigation:global_module_bar.html.twig', array(
            'mappings' => $mappings
        ));
    }

    /**
     * Global Bundle Bar Action
     *
     * @return Response
     */
    public function appModuleBarAction()
    {
        // Access restricted to ROLE_BACKEND_ADMIN
        if (false === $this->get('security.context')->isGranted('ROLE_BACKEND_ADMIN')) {
            return new Response();
        }

        $mappings = $this->mappingRepository->findBy(array('navigation' => NavigationRepository::APP_MODULE_BAR_ID), array('ordering' => 'ASC'));

        return $this->render('FlexySystemBundle:Backend/Navigation:app_module_bar.html.twig', array(
            'mappings' => $mappings,
            'managedApp' => $this->getApp()
        ));
    }

    /**
     * Application selection navigation
     *
     * @return Response
     */
    public function appAction()
    {
        $appCurrent = $this->getCore()->getApp();

        $appRepo = $this->getDoctrine()->getRepository('FlexySystemBundle:App');
        $apps = $appRepo->findBy(array(), array('ordering' => 'asc'));

        // BC fix, previous version had a "backend" application that need to be removed
        foreach ($apps as $key => $app) {
            if ($app->getId() == AppRepository::BACKEND_APP_ID) {
                unset($apps[$key]);
            }
        }

        return $this->render('FlexySystemBundle:Backend/Navigation:app.html.twig', array(
            'apps' => $apps,
            'appCurrent' => $appCurrent
        ));
    }

    /**
     * Breadcrumbs Action
     *
     * @return Response
     */
    public function breadcrumbsAction()
    {
        $elementCurrent = $this->getCore()->getElement();
        $elements = $this->get('flexy_system.breadcrumbs')->getElements();

        return $this->render('FlexySystemBundle:Backend/Navigation:breadcrumbs.html.twig', array(
            'elements' => $elements,
            'elementCurrent' => $elementCurrent
        ));
    }

    /**
     * Page Title Action
     *
     * @return Response
     */
    public function pageTitleAction()
    {
        $elements = $this->get('flexy_system.page_title')->getElements();

        return $this->render('FlexySystemBundle:Backend/Navigation:page_title.html.twig', array(
            'elements' => $elements,
        ));
    }

    /**
     * This render the modules that are associated with the current section
     *
     * @return Response
     */
    public function sectionModuleBarAction()
    {
        if (false == $this->getSection()) {
            return new Response();
        }

        $mappings = $this->mappingRepository->findBy(array(
            'section' => $this->getSection(),
            'navigation' => NavigationRepository::SECTION_MODULE_BAR_ID
        ));

        return $this->render('FlexySystemBundle:Backend/Navigation:section_module_bar.html.twig', array(
            'mappings' => $mappings,
        ));
    }

    /**
     * Locale Bar Action
     *
     * @return Response
     */
    public function localeBarAction()
    {
        $localeRepo = $this->getEm()->getRepository('FlexySystemBundle:Locale');
        $locales = $localeRepo->findAll();

        return $this->render('FlexySystemBundle:Backend/Navigation:locale_bar.html.twig', array(
            'locales' => $locales,
            'editLocale' => $this->getCore()->getEditLocale()
        ));
    }
}
