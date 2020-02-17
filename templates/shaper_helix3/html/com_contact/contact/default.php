<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

jimport('joomla.html.html.bootstrap');

$cparams = JComponentHelper::getParams('com_media');
$tparams = $this->item->params;

?>
<h1><?php echo JText::_('COM_CONTACT_OUR_CONTACTS');?></h1>
<div class="contact<?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Person">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-6">
				<?php if ($tparams->get('show_email_form') && ($this->contact->email_to || $this->contact->user_id)) : ?>
					<?php if ($presentation_style === 'sliders') : ?>
						<?php if (!$accordionStarted)
						{
							echo JHtml::_('bootstrap.startAccordion', 'slide-contact', array('active' => 'display-form'));
							$accordionStarted = true;
						}
						?>
						<?php echo JHtml::_('bootstrap.addSlide', 'slide-contact', JText::_('COM_CONTACT_EMAIL_FORM'), 'display-form'); ?>
					<?php elseif ($presentation_style === 'tabs') : ?>
						<?php if (!$tabSetStarted)
						{
							echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'display-form'));
							$tabSetStarted = true;
						}
						?>
						<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'display-form', JText::_('COM_CONTACT_EMAIL_FORM')); ?>
					<?php elseif ($presentation_style === 'plain') : ?>
						<?php echo '<h3>' . JText::_('COM_CONTACT_EMAIL_FORM') . '</h3>'; ?>
					<?php endif; ?>

					<?php echo $this->loadTemplate('form'); ?>

					<?php if ($presentation_style === 'sliders') : ?>
						<?php echo JHtml::_('bootstrap.endSlide'); ?>
					<?php elseif ($presentation_style === 'tabs') : ?>
						<?php echo JHtml::_('bootstrap.endTab'); ?>
					<?php endif; ?>
				<?php endif; ?>
		  </div>
	    <div class="col-sm-12 col-md-6">
				<?php if ($this->contact->misc && $tparams->get('show_misc')) : ?>
					<div class="contact-miscinfo">
						<div class="contact-block">
							<div class="contact-desc">
								<span class="contact-misc">
									<?php echo $this->contact->misc; ?>
								</span>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
	  </div>
  </div>
</div>
