<?php include './application/views/common/header.php';?>

<main class="main">
     <?
    //$cID="";
    //     $ppID="";
    //     if($parent_category!=null)
    //     {
    //         $cID=$parent_category;
    //         echo $cID;
    //     }
    //     else{
    //         echo $cID;
    //     }
    //     if($parent_parent_category!=null)
    //     {
    //         echo $ppID=$parent_parent_category;
    //     }
    //     else{
    //         echo $ppID="0";
    //     }
        ?>
   <?php if ($parent_category->title == 'Surveillance'): ?>
   <section class="page-title" style="background-image: url(<?php echo base_url('');?>include/photos/Top_Banner_1.png);">
      <div class="container">
         <div class="title-outer">
            <?php if($parent_parent_category){?>
            <h1> <?php echo $parent_category->title; ?></h1>
            <?php } ?>
         </div>
      </div>
   </section>
   <?php endif; ?>
   <?php if ($parent_category->title == 'SMB Wireless'): ?>
   <section class="page-title" style="background-image: url(<?php echo base_url('');?>include/photos/Top_Banner_2.png);">
      <div class="container">
         <div class="title-outer">
            <?php if($parent_parent_category){?>
            <h1> <?php echo $parent_category->title; ?></h1>
            <?php } ?>
         </div>
      </div>
   </section>
   <?php endif; ?>
   <?php if ($parent_category->title == 'Rugged Switch'): ?>
   <section class="page-title" style="background-image: url(<?php echo base_url('');?>include/photos/Top_Banner_3.png);">
      <div class="container">
         <div class="title-outer">
            <?php if($parent_parent_category){?>
            <h1> <?php echo $parent_category->title; ?></h1>
            <?php } ?>
         </div>
      </div>
   </section>
   <?php endif; ?>
   <?php if ($parent_category->title == 'Network Switch'): ?>
   <section class="page-title" style="background-image: url(<?php echo base_url('');?>include/photos/Top_Banner_4.png);">
      <div class="container">
         <div class="title-outer">
            <?php if($parent_parent_category){?>
            <h1> <?php echo $parent_category->title; ?></h1>
            <?php } ?>
         </div>
      </div>
   </section>
   <?php endif; ?>
   <?php if ($parent_category->title == 'Network Switches'): ?>
   <section class="page-title" style="background-image: url(<?php echo base_url('');?>include/photos/Top_Banner_5.png);">
      <div class="container">
         <div class="title-outer">
            <?php if($parent_parent_category){?>
            <h1> <?php echo $parent_category->title; ?></h1>
            <?php } ?>
         </div>
      </div>
   </section>
   <?php endif; ?>
   <?php if ($parent_category->title == 'Industrial Switches'): ?>
   <section class="page-title" style="background-image: url(<?php echo base_url('');?>include/photos/Top_Banner_6.png);">
      <div class="container">
         <div class="title-outer">
            <?php if($parent_parent_category){?>
            <h1> <?php echo $parent_category->title; ?></h1>
            <?php } ?>
         </div>
      </div>
   </section>
   <?php endif; ?>
   <?php if ($parent_category->title == 'Network Security'): ?>
   <section class="page-title" style="background-image: url(<?php echo base_url('');?>include/photos/Top_Banner_7.png);">
      <div class="container">
         <div class="title-outer">
            <?php if($parent_parent_category){?>
            <h1> <?php echo $parent_category->title; ?></h1>
            <?php } ?>
         </div>
      </div>
   </section>
   <?php endif; ?>
   <?php if ($parent_category->title == 'Enterprise Wireless'): ?>
   <section class="page-title" style="background-image: url(<?php echo base_url('');?>include/photos/Top_Banner_8.png);">
      <div class="container">
         <div class="title-outer">
            <?php if($parent_parent_category){?>
            <h1> <?php echo $parent_category->title; ?></h1>
            <?php } ?>
         </div>
      </div>
   </section>
   <?php endif; ?>
   <?php if ($title == 'Servers & Workstations | Aadona'): ?>
   <section class="page-title" style="background-image: url(<?php echo base_url('');?>include/photos/Top_Banner_1.png);">
      <div class="container">
         <div class="title-outer">
            <h1>Servers and Workstations </h1>
            <?php if($parent_parent_category){?>
            <h1> <?php echo $parent_category->title; ?></h1>
            <?php } ?>
         </div>
      </div>
   </section>
   <?php endif; ?>
   <?php if ($title == 'Network Attached Storage | Aadona'): ?>
   <section class="page-title" style="background-image: url(<?php echo base_url('');?>include/photos/Top_Banner_2.png);">
      <div class="container">
         <div class="title-outer">
            <h1>Network Attached Storage </h1>
            <?php if($parent_parent_category){?>
            <h1> <?php echo $parent_category->title; ?></h1>
            <?php } ?>
         </div>
      </div>
   </section>

   <?php endif; ?>
   
   <section class="pt-5"   style="background-image: url('<?php echo base_url('');?>include/photos/pattern-3.jpg');">
      <div class="container ">
         <div class="row mb-lg-3">
            <?php if($parent_parent_category && count($child_category) > 0){ ?>
            <div class="col-lg-3" >
               <div class="sidebar-wrapper" id="custom-sidebar-wrapper">
                  <ul class="widget widget-product-categories mb-3">
                     <?php
                        if(count($child_category) > 0){
                           foreach ($child_category as $child) {
                              $is_active = '';
                              if($child['category_id'] == $category_details->category_id){
                                 $is_active = 'id = "active_tab"';
                              }
                              echo '<li>';
                              echo '<h3 class="widget-title">';
                              echo '<a href="'.base_url('product-list/'.$child['slug']).'" '.$is_active.'>'.$child['title'].'</a>';
                              echo '</h3>';
                              echo '</li>';
                           }
                        }
                        ?>
                  </ul>
               </div>
            </div>
            <?php }
               else
               {?>
                <div class="" ></div>
            <?php
               } ?>
             
            <div class="<?php if($parent_parent_category && count($child_category) > 0){  echo 'col-lg-9';  }else { echo 'col-lg-12'; } ?> mb-lg-0">
               <div class="row row-sm">
			   
					 <?php 
                      $pCateName="";
                     if(isset($parent_parent_category->title))
                     {
                           $pCateName=$parent_parent_category->title;
                     }
                     else{
                        $pCateName=$title;
                     }
                    
                  ?>
                  <?php 
                        if($pCateName!="")
                        {
							//For Slug Labels
                           if(isset($parent_parent_category->slug))
                           {
                              // For Enterprise
                              if($parent_parent_category->slug=="enterprise")
                                 { 
									if($parent_category->title=='Surveillance')
                                       { 
                                       ?>
                                   
                                    <div class="col-md-12">
                                       <p class="text-justify">
                                               AADONA's ORION Series IP Surveillance solution offers a comprehensive range of IP cameras designed to cater to various needs, ranging from entry-level to enterprise-level requirements. The cameras are categorized into three segments: Silver, Gold, and Platinum series, providing options that align with different customer preferences and budgets.
                                       </p>
                                    <p class="text-justify">
                                                       Made in India, AADONA IP Cameras are known for their crystal-clear image quality, ensuring optimal visibility and clarity in surveillance footage. These cameras are suitable for a wide range of applications, from basic home surveillance solutions to advanced functionalities such as Automatic Number Plate Recognition (ANPR), Facial Recognition, Line Crossing, Intrusion Detection, and more. This versatility allows customers to choose the appropriate camera model that meets their specific requirements.     
                                                   </p>
												   <p class="text-justify">
													AADONA offers a complete end-to-end security surveillance solution, covering not only IP cameras but also encompassing software, Network Video Recorders (NVRs), and Video Management System (VMS) solutions. This comprehensive approach ensures that AADONA can cater to the security needs of small to large-scale deployments.
												   </p>
												    <p class="text-justify">
													The ORION Series IP Surveillance solution from AADONA is designed with a focus on innovation, quality, and performance. It is an enterprise-class offering, providing advanced features and capabilities to meet the demanding requirements of modern surveillance systems. AADONA's expertise allows them to offer a wide range of products and solutions tailored to the specific needs of customers.
												   </p>
												    <p class="text-justify">
													AADONA's surveillance solution is well-suited for various types of enterprises, including government entities, private enterprises, and small and medium-sized enterprises (SMEs). Regardless of the scale or industry, AADONA's surveillance solution can provide effective security and surveillance capabilities to meet the unique needs of each organization.
												   </p>
												    <p class="text-justify">
													In summary, AADONA's ORION Series IP Surveillance solution offers a wide range of IP cameras categorized into Silver, Gold, and Platinum series. With crystal-clear image quality and a diverse range of applications, these cameras cater to different customer needs. AADONA provides a complete end-to-end security surveillance solution, including cameras, software, NVRs, and VMS solutions, covering small to large-scale security requirements. Designed with a focus on innovation, quality, and performance, the ORION Series IP Surveillance solution is suitable for government enterprises, private enterprises, and SMEs, delivering reliable and effective surveillance capabilities.</p>
                                    </div>

                                 <?php 
                                    }
                                      if($parent_category->title == 'Network Switches')
                                          {?>
                                                 <div class="col-md-12">
                                                   <p class="text-justify">
                                                       AADONA's Diana Series network switches are proudly made in India and offer a wide range of variants, catering to different networking requirements from unmanaged switches to data center-level switches. These solutions are specifically designed to meet the needs of enterprise customers who require premium networking equipment that is cost-effective, high in quality, reliability, and performance.     
                                                   </p>
												   <p class="text-justify">
                                                          AADONA's enterprise network switch solutions are tailored to deliver optimal results for enterprise customers. With a mission-oriented design and a comprehensive product portfolio, AADONA offers best-fit solutions that address the diverse networking requirements of different vertical markets.  
                                                   </p>
												   <p class="text-justify">
                                                         The Diana Series network switches are well-suited for various enterprise deployments, including data centers and server rooms where performance and stability are paramount. They also excel in wireless deployments, surveillance deployments, IP phone systems, and serving as the network backbone of enterprise IT infrastructure. AADONA's enterprise network switches provide the robustness and performance required to support critical enterprise applications.   
                                                   </p>
												   <p class="text-justify">
                                                            Moreover, AADONA's enterprise network switches are an excellent choice for government tenders and projects that require Made in India (MII) products. These switches offer a reliable and indigenous networking solution that aligns with the requirements of government organizations.
                                                   </p>
												   <p class="text-justify">
                                                            AADONA's Diana Series network switches combine the advantages of being Made in India with a focus on meeting the specific needs of enterprise customers. By delivering cost-effective, high-quality, reliable, and high-performance networking solutions, AADONA enables enterprises to build robust and efficient networks.
                                                   </p>
												   <p class="text-justify">
                                                          In summary, AADONA's Diana Series network switches, proudly made in India, provide a comprehensive range of variants suitable for enterprise customers. These solutions offer premium networking equipment that is cost-effective, high in quality, reliability, and performance. With a mission-oriented design and a complete product portfolio, AADONA ensures the provision of best-fit solutions for enterprises across various vertical markets. Whether it's data centers, server rooms, wireless deployments, surveillance applications, IP phone systems, or serving as the network backbone, AADONA's enterprise network switches deliver the performance and stability required. Additionally, these switches are an ideal choice for government tenders and projects that demand Made in India products.  
                                                   </p>
                                                
                                                </div> 
                                          <?php }
                                          if($parent_category->title == 'Industrial Switches')
                                          {?>
                                                 <div class="col-md-12">
                                                   <p class="text-justify">
                                                       AADONA offers a range of true industrial and reliable Ethernet switches designed to thrive in challenging environments characterized by wide temperature variations, heavy vibration, and shock. These high-temperature Ethernet switches are built to operate effectively in extreme hot and cold conditions, ensuring reliable network connectivity in demanding settings.     
                                                   </p>
												   <p class="text-justify">
                                                            The AADONA true industrial Ethernet switch family comprises both managed and unmanaged switches, providing flexibility to accommodate different networking requirements. These switches are equipped with features such as Power over Ethernet (PoE) support, gigabit ports, SFP slots, and variable voltage capabilities, allowing for versatile and robust network deployments.
                                                   </p>
												   <p class="text-justify">
                                                            AADONA's true industrial switches are specifically engineered for use in harsh environments, including factories, warehouses, refineries, and rolling stock. These hardened switches are designed to withstand challenging conditions and can be effectively utilized in a wide range of networking and surveillance applications. Whether it's railway stations, subway stations, high terrains, or smart city deployments, AADONA's true industrial switches deliver reliable network performance.
                                                   </p>
												   <p class="text-justify">
                                                         Recognizing that industrial environments vary in design and functionality, AADONA's true industrial switch family includes a range of industrial specialty switches to cater to specific needs. These specialty switch models include DIN-rail Ethernet switches (or DIN mount switches), railway switches, and front access wall mount switches. This diverse product lineup ensures that AADONA can provide tailored solutions to meet the unique requirements of different industrial settings.   
                                                   </p>
												   <p class="text-justify">
                                                       AADONA's true industrial Ethernet switches are built to withstand shock and vibration, ensuring uninterrupted network connectivity even in physically demanding environments. Multiple redundant power inputs with overload current protection contribute to enhanced reliability, and select models feature a power failure alarm for added convenience. Furthermore, AADONA's true industrial Ethernet switches comply with industry safety standards for electromagnetic emissions/immunity, ensuring compatibility with existing infrastructure.     
                                                   </p>
												   <p class="text-justify">
                                                            AADONA's industrial switches are proudly made in India, reflecting the brand's commitment to quality and reliability. This localized production enables efficient supply chains and localized support for customers.
                                                   </p>
												   <p class="text-justify">
                                                        In summary, AADONA's true industrial Ethernet switches are designed to thrive in environments with wide temperature variations, vibration, and shock. Offering both managed and unmanaged options with advanced features, these true industrial switches are well-suited for deployment in harsh settings. The industrial switch family includes specialty models to cater to diverse needs, and features such as shock and vibration resistance, multiple redundant power inputs, and compliance with safety standards contribute to their reliability. Made in India, AADONA's industrial switches provide dependable network solutions for a wide range of industrial applications.    
                                                   </p>
												  
                                                
                                                </div> 
                                          <?php }

                                          if($parent_category->title == 'Network Security')
                                          {?>
                                                 <div class="col-md-12">
                                                   <p class="text-justify">
                                                           The AADONA ICARUS Series is an advanced, made-in-India next-generation firewall designed to provide premium-class enterprise security solutions. With its wide range of features and capabilities, the ICARUS Series is suitable for various sectors, including government, BFSI (Banking, Financial Services, and Insurance), defense, railways, and more. This overview will highlight the key aspects and benefits of the AADONA ICARUS Series, such as its scalability, flexibility, certifications, and comprehensive warranty. 
                                                   </p>
												   
												   
												   <p class="text-justify">
													<h5>Key Features:</h5>	
													<ol>
														<li class="text-justify"><strong>Enterprise-grade Security:</strong> The ICARUS Series offers robust security features to safeguard critical data and network infrastructure. It incorporates advanced threat detection, intrusion prevention, malware protection, and content filtering capabilities.</li>
														<li class="text-justify">
														<strong>Application Support:</strong> With its wide range of applications, the ICARUS Series is tailored to meet the diverse needs of different industries. Whether it's securing sensitive government networks, protecting financial institutions, or ensuring the integrity of defense systems, the ICARUS Series delivers reliable application support.
														</li>
														<li class="text-justify">
														<strong>Scalability:</strong> The ICARUS Series is available in various models, ranging from 50-user to 2000-user appliances. For larger organizations, it offers server or cloud-based solutions to cater to more than 2000 users. This scalability ensures that businesses of all sizes can find a suitable solution to meet their specific requirements.
														</li>
														<li class="text-justify">
														<strong>Modular Design:</strong> AADONA ICARUS appliances feature a modular design that provides flexibility in choosing interfaces. This enables organizations to customize their firewall setup according to their network architecture and connectivity needs.
														</li>
														<li class="text-justify">
														<strong>High-speed Connectivity:</strong> The appliances in the ICARUS Series are equipped with 1G to 10G ports, allowing for seamless high-speed connectivity. This ensures efficient data transfer and supports bandwidth-intensive applications, meeting the demands of modern enterprise networks.
														</li>
													</ol>
													
												   </p>
												   <h5>Certifications:</h5>
												   <p class="text-justify">
												   AADONA takes pride in its commitment to quality and compliance. The ICARUS Series is certified with the following standards:
												   <ul>
													<li>ISO-9001: Demonstrates adherence to quality management systems.</li>
													<li>ISO-1002: Ensures compliance with product and service quality standards.</li>
													<li>ISO-14001: Highlights environmental management system compliance.</li>
													<li>ISO-27001: Guarantees information security management system implementation.</li>
													<li>MSME: Recognizes AADONA as a Micro, Small, and Medium Enterprises.</li>
													<li>DPIIT: Certification from the Department for Promotion of Industry and Internal Trade.</li>
												   </ul>
												   </p>
												   <h4>Comprehensive Warranty:</h4>
												   <p class="text-justify">
												   AADONA provides a comprehensive three-year warranty with the ICARUS Series. This warranty coverage offers peace of mind to customers, ensuring that any manufacturing defects or functional issues are promptly addressed and resolved.
												   
													</p>	
													<h5>Conclusion:</h5>
												   <p class="text-justify">
												   The AADONA ICARUS Series stands as a leading made-in-India next-generation firewall solution, providing a wide range of premium-class enterprise security features. With its scalability, modular design, high-speed connectivity, and certifications, the ICARUS Series caters to the security needs of government, BFSI, defense, railways, and other sectors. Backed by a comprehensive three-year warranty, AADONA ICARUS Series empowers organizations to protect their networks and critical data effectively.
												   
													</p>														
                                                
                                                </div> 
                                          <?php }                                     
                                          if($parent_category->title == 'Enterprise Wireless')
                                          {?>
                                                 <div class="col-md-12">
                                                   <p class="text-justify">
                                                       AADONA's Apollo Series is a range of high-performance enterprise wireless access points and controllers designed to meet the demanding requirements of modern wireless networking. The Apollo access point series offers a wide range of options, from 802.11ac to the latest 802.11ax (Wi-Fi 6) standards, covering indoor, outdoor, and point-to-point deployments.     
                                                   </p>
												   <p class="text-justify">
                                                       In today's interconnected world, communication is essential, and Wi-Fi has become a ubiquitous necessity. The post-COVID era has witnessed a significant surge in the demand for high-quality and cost-effective Wi-Fi solutions, and with the impending arrival of 5G technology, this demand is expected to further escalate.     
                                                   </p>
												   <p class="text-justify">
                                                        AADONA's wireless solutions, available in both 802.11ac and 802.11ax flavors, are designed to fulfill the rising customer expectations for robust and reliable wireless connectivity, regardless of the environmental challenges. The features offered by the access points address the diverse needs of customers and ensure seamless connectivity even in demanding environments.    
                                                   </p>
												   <p class="text-justify">
                                                          The Apollo series wireless access points and controllers from AADONA are not limited to addressing SMB (Small and Medium-sized Business) needs; they also cater to the requirements of different vertical markets. Whether it's education, healthcare, hospitality, government, manufacturing, retail chains, smart cities, or city surveillance, AADONA's solutions are tailored to meet the specific demands of each industry.  
                                                   </p>
												   <p class="text-justify">
                                                            AADONA's Apollo series wireless access points and controllers are suitable for both indoor and outdoor applications, offering true enterprise-grade smart wireless networks. Regardless of the deployment scenario, these solutions provide highly secure performance and reliable throughput, even in high-density user environments. The combination of enterprise-grade wireless controllers and access points ensures optimal connectivity and seamless user experiences.
                                                   </p>
												   <p class="text-justify">
                                                            In summary, AADONA's Apollo Series offers high-performance enterprise wireless access points and controllers. With a wide range of options covering different Wi-Fi standards and deployment scenarios, AADONA addresses the increased demand for high-quality and cost-effective Wi-Fi solutions. The Apollo series caters to various industry verticals and provides true enterprise-grade smart wireless networks. These solutions deliver highly secure performance and reliable throughput, even in high-density user environments. AADONA's wireless offerings are designed to meet the evolving needs of customers in a wide range of sectors, ensuring seamless connectivity and optimal wireless networking experiences.
                                                   </p>
												   
                                                
                                                </div> 
                                          <?php }  
								 }
							//For SMB	 
								 if($parent_parent_category->slug=="smb")
                                 { ?>
							 <?php if ($parent_category->title == 'Surveillance'): ?>
                  <div class="col-md-12">
                     <p class="text-justify">
                        AADONA ORION Series IP Surveillance Solution is a comprehensive range of IP cameras designed to cater to a wide range of surveillance needs, ranging from entry-level to enterprise-level requirements. The solution is categorized into three segments: Silver, Gold, and Platinum series, each offering distinct features and capabilities.
                     </p>
                     <p class="text-justify">
                         AADONA IP Cameras are proudly manufactured in India and are known for their crystal-clear image quality, ensuring superior visual clarity in various surveillance scenarios. These cameras are suitable for a wide range of applications, starting from basic home surveillance to advanced functionalities like Automatic Number Plate Recognition (ANPR), Facial Recognition, Line Crossing Detection, Intrusion Detection, and many more.
                     </p>
                     <p class="text-justify">
                        The AADONA IP Surveillance Solution provides a complete end-to-end security solution, encompassing cameras, software, Network Video Recorders (NVR), and Video Management System (VMS) solutions. This comprehensive offering ensures that all security needs, whether small or large, are taken care of efficiently.
                     </p>
                     <p class="text-justify">
                        AADONA ORION Series IP Surveillance Solution is designed with a focus on innovation, quality, and performance. It is an enterprise-class offering, capable of meeting diverse customer requirements. With a wide range of products and solutions, AADONA can tailor its offerings to address specific surveillance challenges, providing customized solutions to meet the unique needs of various industries and organizations.
                     </p>
                     <p class="text-justify">
                        The AADONA brand surveillance solution is well-suited for different user segments. Home users can benefit from the user-friendly and reliable surveillance system to ensure the safety and security of their premises. Small and Medium-sized Business (SMB) users can leverage the scalability and flexibility of AADONA's solution to address their evolving security needs effectively.
                     </p>
                     <p class="text-justify">
                         Moreover, AADONA's IP Surveillance Solution is an ideal choice for government and Smart City projects. With advanced features like ANPR, facial recognition, and intelligent analytics, it offers the capability to enhance security, manage traffic flow, and ensure public safety in urban environments.
                     </p>
                     <p class="text-justify">
                        AADONA ORION Series IP Surveillance Solution offers a wide range of IP cameras categorized into Silver, Gold, and Platinum series. With its made-in-India cameras providing crystal-clear image quality, the solution caters to various applications and requirements, from basic home surveillance to advanced functionalities like ANPR and facial recognition. AADONA's end-to-end security surveillance solution, encompassing cameras, software, NVR, and VMS, ensures comprehensive coverage of small to large security needs. Designed with innovation, quality, and performance in mind, AADONA's enterprise-class offering can be customized to meet customer requirements and is suitable for home users, SMB users, as well as government and Smart City projects.
                     </p>
                  </div>

                  <?php endif ?>
				  
                  <?php if ($parent_category->title == 'SMB Wireless'): ?>
                  <p class="text-justify">
                     The AADONA brand's APOLLO Series offers a wide range of high-performance SMB access points that cater to the increasing demand for reliable and cost-effective WiFi connectivity. With the world relying heavily on communication, WiFi has become an essential necessity, and the post-COVID era has further accelerated the need for high-quality wireless networks. As 5G technology approaches, the demand for efficient WiFi solutions is expected to grow even more.
                  </p>
                  <p class="text-justify">
                      AADONA's APOLLO access point series encompasses a variety of options, ranging from 802.11ac to 802.11ax, designed for indoor, outdoor, and point-to-point applications. These access points are built to deliver exceptional performance, meeting the rising customer expectations in even the most challenging environments.
                  </p>
                  <p class="text-justify">
                      The AADONA wireless access points are available in both 802.11ac and 802.11ax variants, ensuring compatibility with the latest WiFi standards. The feature set offered by these access points caters to diverse customer requirements, providing reliable and high-speed wireless connectivity. With the ever-increasing demand for bandwidth, AADONA's access points deliver the necessary performance to support data-intensive applications and services.
                  </p>
                  <p class="text-justify">
                    The APOLLO series wireless access points from AADONA are not only designed to address SMB (Small and Medium-sized Business) needs but also meet the requirements of various vertical markets. These include Education, Healthcare, Hospitality, Government, Manufacturing, Retail Chains, Smart City deployments, City Surveillance, and many more. The versatility of AADONA's access points makes them suitable for a wide range of industry-specific applications.      
                  </p>
                  <p class="text-justify">
                    AADONA's APOLLO series wireless access points, coupled with their wireless controllers, provide true SMB-grade smart wireless networks for all industry verticals. Whether deployed indoors or outdoors, these access points ensure highly secure and reliable performance, even in high user density environments. This makes them ideal for scenarios where a robust and stable WiFi network is crucial.  
                  </p>
                  <p class="text-justify">
                    AADONA's APOLLO Series offers a wide range of high-performance SMB access points, covering 802.11ac and 802.11ax standards. These access points cater to various deployment scenarios, including indoor, outdoor, and point-to-point applications. With the increasing demand for cost-effective and reliable WiFi connectivity, AADONA's APOLLO series is designed to meet rising customer expectations. The solutions not only fulfill the needs of SMBs but also cater to different vertical markets such as Education, Healthcare, Hospitality, Government, Manufacturing, and more. By delivering secure and high-performance wireless networks, AADONA's APOLLO series ensures reliable connectivity in even the most challenging environments.  
                  </p>
                 
                  
                  <?php endif ?>
                  <?php if ($parent_category->title == 'Rugged Switch'): ?>
                  <p class="text-justify">
                     AADONA offers a range of rugged and reliable Ethernet switches designed to operate in challenging environments with wide temperature variations, heavy vibration, and shock. These cost-effective switches are specifically engineered to withstand extreme conditions, making them suitable for a variety of demanding applications.
                  </p>
                   <p class="text-justify">
                      AADONA's rugged Ethernet switches are built to function in both extremely hot and cold temperatures, ensuring reliable performance in harsh environments. They are designed with robustness in mind and can withstand heavy vibrations and shocks, making them ideal for use in industries such as factories, warehouses, refineries, and rolling stock.
                  </p>
                  <p class="text-justify">
                      The rugged switch family from AADONA includes both managed and unmanaged switches, providing flexibility to meet different networking requirements. These switches come with various features such as Power over Ethernet (PoE) support, gigabit ports, Small Form-Factor Pluggable (SFP) slots, and variable voltage options, enhancing their versatility and suitability for a wide range of applications.
                  </p>
                  <p class="text-justify">
                    AADONA's rugged switches are dependable and hardened solutions that excel in demanding environments. They can be effectively deployed in scenarios such as railway stations, subway stations, high terrains, or smart city deployments. These switches are designed to withstand the unique challenges posed by harsh environments and ensure reliable network connectivity.  
                  </p>
                  <p class="text-justify">
                    To cater to the diverse needs of industrial environments, AADONA's rugged switch family includes a variety of specialty switches. These include DIN-rail Ethernet switches (or DIN mount switches) for convenient installation, railway switches specifically designed for railway applications, and front access wall mount switches for easy accessibility in space-constrained environments.  
                  </p>
                  <p class="text-justify">
                      AADONA's rugged Ethernet switches feature shock and vibration resistance, ensuring their durability in challenging conditions. They are equipped with multiple redundant power inputs and overload current protection, ensuring uninterrupted operation even in the event of a power failure. Additionally, select models come with a power failure alarm, providing an additional layer of protection and alerting system administrators in case of power disruptions.
                  </p>
                  <p class="text-justify">
                      Compliance with industry safety standards for electromagnetic emissions/immunity ensures that AADONA's rugged Ethernet switches meet the necessary requirements for safe and reliable operation in industrial environments.
                  </p>
                  <p class="text-justify">
                    AADONA's rugged and reliable Ethernet switches are cost-effective solutions designed for environments with wide temperature variations, heavy vibration, and shock. These switches operate in extreme hot and cold conditions and are suitable for industries such as factories, warehouses, refineries, and rolling stock. With features like PoE support, gigabit ports, SFP slots, and variable voltage options, AADONA's rugged switches cater to various networking and surveillance applications in harsh environments. The diverse switch family includes specialty switches for specific industrial needs, and their shock and vibration resistance, redundant power inputs, and industry compliance make them reliable and safe choices for demanding environments.          
                  </p>
                  <?php endif ?>
                  <?php if ($parent_category->title == 'Network Switch'): ?>
                  <div class="col-md-12">
                 <p class="text-justify">
                    AADONA's Diana Series network switches are proudly manufactured in India and offer a wide range of variants, catering to diverse networking requirements. From unmanaged switches to data center-level switches, AADONA provides reliable and efficient solutions suitable for SMB (Small and Medium-sized Business) and SME (Small and Medium-sized Enterprise) customers.      
                  </p>
                     <p class="text-justify">
                        The AADONA Diana Series network switches are designed to meet the networking needs of SMBs and SMEs. These solutions offer premium networking equipment that is cost-effective, high in quality, and delivers exceptional reliability and performance. With a mission-oriented design and a comprehensive product portfolio, AADONA aims to provide the best-fit solutions for customers, ensuring their networking requirements are met effectively.
                     </p>
                     <p class="text-justify">
                        The AADONA switch solutions not only cater to SMB customer needs but also address the requirements of different vertical markets. This versatility allows businesses in various industries to benefit from AADONA's network switches, ensuring reliable and efficient networking infrastructure.    
                     </p>
                     <p class="text-justify">
                        The SMB network switch solutions from AADONA are particularly well-suited for wireless deployments, surveillance deployments, IP Phones, and serving as the network backbone of SMB/SME IT infrastructure. Whether it's setting up a reliable and secure wireless network, integrating surveillance systems, implementing VoIP communication, or establishing a robust network infrastructure, AADONA's SMB network switches provide the necessary functionality and performance.    
                     </p>
                     <p class="text-justify">
                        By choosing AADONA's Diana Series network switches, SMB and SME customers can expect a cost-effective solution without compromising on quality or performance. These switches offer the reliability and features needed for efficient network management, enabling businesses to enhance productivity and streamline their operations.        
                     </p>
                     <p class="text-justify">
                        AADONA's Diana Series network switches are made in India and provide a wide range of options, from unmanaged to data center-level switches. Designed with SMB and SME customers in mind, these solutions offer premium networking equipment that is cost-effective, high in quality, and reliable. AADONA's mission-oriented design approach and comprehensive product portfolio ensure the best-fit solutions for customers, meeting their specific networking needs. Whether it's wireless deployments, surveillance systems, IP Phones, or serving as the network backbone, AADONA's SMB network switches deliver optimal performance and are suitable for various vertical markets.   
                     </p>
                     <p class="text-justify">
                        AADONA's Diana Series network switches are made in India and provide a wide range of options, from unmanaged to data center-level switches. Designed with SMB and SME customers in mind, these solutions offer premium networking equipment that is cost-effective, high in quality, and reliable. AADONA's mission-oriented design approach and comprehensive product portfolio ensure the best-fit solutions for customers, meeting their specific networking needs. Whether it's wireless deployments, surveillance systems, IP Phones, or serving as the network backbone, AADONA's SMB network switches deliver optimal performance and are suitable for various vertical markets.
                     </p>
                     
                  </div>
                  <?php endif ?>
				  
									
								<?php }
						   }
							
							//For Enterprise Non Slug
							if( $_SERVER['REQUEST_URI']=="/enterprise-servers-and-workstations"|| $_SERVER['REQUEST_URI']=="/product-list/servers" || $_SERVER['REQUEST_URI']=="/product-list/workstations"){?>
								<div class="col-md-12">
                                       <p class="text-justify">
									   AADONA IRIS series presents a comprehensive range of premium-class enterprise servers and workstations designed to cater to the diverse needs of various industries, including Government, BFSI, Defence, Railways, and more. Our cutting-edge products are built with the utmost precision and are backed by a wide array of features and certifications to ensure top-notch performance, reliability, and security.
									   </p>
									   <h5>Key Features:</h5>
									    <p class="text-justify">
											<ol>
												<li class="text-justify">Powerful Performance: AADONA IRIS servers and workstations are equipped with the latest Intel Xeon processors, delivering exceptional processing power and efficiency to handle resource-intensive applications and workloads.</li>
												<li class="text-justify">Flexible Configuration: We offer a wide range of RAM capacity options, allowing you to customize your system to meet the specific requirements of your business. Whether you need ample memory for data-intensive tasks or streamlined operations, AADONA has you covered.</li>
												<li class="text-justify">High-Speed Connectivity: Our servers and workstations come with a diverse selection of LAN ports, ranging from 1G to 100G, ensuring seamless connectivity and efficient data transfer across your network infrastructure</li>
												<li class="text-justify">Comprehensive Warranty: With AADONA, you can be confident in the reliability of your investment. Our products are backed by a 3-year comprehensive warranty, providing peace of mind and dedicated support.</li>
											</ol>
										</p>
										<h5>Certifications:</h5>
										 <p class="text-justify">
											AADONA takes pride in its commitment to quality and adherence to industry standards. Our servers and workstations are ISO-9001, ISO-1002, ISO-14001, ISO-27001, MSME, and DPIIT certified. These certifications reflect our dedication to meeting stringent quality management, environmental management, information security, and government regulations.
										 </p>
										 <h5>Why Choose AADONA:</h5>
										 <p class="text-justify">
										 <ol>
												<li class="text-justify">Made in India: AADONA proudly manufactures its enterprise servers and workstations in India, contributing to the growth of the local economy and ensuring superior quality control.</li>
												<li class="text-justify">Industry Expertise: Our products are designed by a team of seasoned professionals who possess a deep understanding of the requirements and challenges faced by various sectors. We strive to deliver solutions tailored to your specific industry needs.</li>
												<li class="text-justify">Commitment to Excellence: AADONA's commitment to excellence is evident in our focus on performance, reliability, and security. Our products are built to deliver exceptional results, ensuring your organization operates smoothly and efficiently.</li>
												<li class="text-justify">Customer Support: We value our customers and are dedicated to providing excellent support throughout your journey with AADONA. Our knowledgeable support team is available to assist you with any queries or concerns you may have.</li>
											</ol>
										 </p>
										 <p class="text-justify">
										 Transform your enterprise with AADONA Made in India Enterprise Servers and Workstations. Experience unparalleled performance, reliability, and security across a range of industries. Contact us today to discuss how AADONA can empower your business.
										 </p>
								</div>
								
						<?php  }

							if( $_SERVER['REQUEST_URI']=="/enterprise-network-attached-storage"|| $_SERVER['REQUEST_URI']=="/product-list/tower-model-desktop" || $_SERVER['REQUEST_URI']=="/product-list/rackmount-nas"){
						?>
							<div class="col-md-12">
                                       <p class="text-justify">
										AADONA offers a range of high-performance enterprise Network Attached Storage solutions designed for customers seeking a robust and reliable NAS solution. With a wide range of models available, customers can choose from 4-bay rack mount models to 96-bay rack mount models, offering scalability to meet varying storage requirements. The storage space ranges from 8TB to a massive 2PB, ensuring ample capacity to store and manage critical data.
									   </p>
									   <p class="text-justify">
									   AADONA also provides customized solutions tailored to meet specific customer application needs. This flexibility allows businesses to optimize their NAS setup based on their unique requirements, ensuring seamless integration into their existing infrastructure.
									   </p>
									   <p class="text-justify">
									   The AADONA NAS solution is renowned for its reliability, performance, and stability. With advanced RAID options available, customers can configure their storage system to provide redundancy and data protection. This ensures that critical data remains safe and accessible even in the event of a drive failure.
									   </p>
									   <p class="text-justify">
									   All AADONA NAS products are backed by a standard 3-year warranty, providing peace of mind and demonstrating the brand's commitment to quality. Additionally, customers have the option to extend the warranty by an additional 2 years at a nominal cost, further enhancing the long-term support and maintenance of the NAS solution.
									   </p>
									   <p class="text-justify">
									   AADONA NAS solutions are available at an absolute one-time cost, eliminating the need for subscriptions or license systems that restrict the number of users, features, or performance. This straightforward pricing model allows businesses to leverage the full potential of the NAS solution without any limitations.
									   </p>
									   <p class="text-justify">
									   AADONA's enterprise NAS products are proudly made in India and have already been successfully deployed in critical applications across government and non-government organizations. The proven track record of these NAS solutions showcases their reliability and performance in demanding environments.
									   </p>
									   <p class="text-justify">
									   In summary, AADONA's high-performance enterprise Network Attached Storage (NAS) offers a wide range of models and storage capacities, including customizable solutions. Known for their reliability, performance, and stability, these NAS systems come with extensive RAID options for data protection. The products are covered by a standard 3-year warranty and can be extended for an additional 2 years. With an upfront cost and no subscription or license system, businesses can fully utilize the NAS solution without restrictions. Made in India, AADONA NAS solutions have a strong track record of successful deployments in critical government and non-government applications.
									   </p>
							</div>
							<?php
							}
							//For SMB Non Slug
						   if($_SERVER['REQUEST_URI']=="/network-attached-storage" || $_SERVER['REQUEST_URI']=="/product-list/rack-mount-nas"){
                                    ?>
                                    <div class="col-md-12">
                                       <p class="text-justify">
                                          AADONA offers a high-performance Network Attached Storage (NAS) solution designed for customers seeking a robust and reliable NAS system. With a wide range of models available, AADONA provides options to suit various requirements. Additionally, AADONA offers customized solutions tailored to meet the specific needs of customers' critical applications.
                                       </p>
                                       <p class="text-justify">
                                          The AADONA NAS solution encompasses models ranging from 4-bay desktop models to 24 bay rack mount models, providing flexibility in terms of form factor and storage capacity. This range allows customers to choose the ideal NAS system that meets their storage requirements.
                                       </p>
                                       <p class="text-justify">
                                          AADONA is renowned for the reliability, performance, and stability of its NAS products. Built with quality components and a focus on delivering optimal performance, AADONA NAS solutions ensure smooth operation and efficient data storage and retrieval.
                                       </p>
                                       <p class="text-justify">
                                          To further ensure customer satisfaction and peace of mind, all AADONA NAS products are covered under a standard 3-year warranty. Additionally, customers have the option to avail a 2-year extended warranty at a nominal cost, providing extended coverage and support.
                                       </p>
                                       <p class="text-justify">
                                          AADONA NAS solutions are characterized by their one-time cost structure. There are no subscription or license systems in place that limit the number of users, features, or performance capabilities. This allows customers to fully utilize the NAS solution without any restrictions, ensuring seamless and efficient data management.
                                       </p>
                                       <p class="text-justify">
                                          AADONA's NAS products are proudly made in India and have already been successfully deployed in numerous critical applications across both government and non-government organizations. This track record demonstrates the reliability and effectiveness of AADONA NAS solutions in demanding environments.
                                       </p>
                                       <p class="text-justify">
                                          In summary, AADONA's High Performance Network Attached Storage (NAS) solution is designed for customers who require a serious and reliable NAS system. With a wide range of models to choose from and the ability to provide customized solutions for critical applications, AADONA offers flexibility to meet diverse storage needs. Known for their reliability, performance, and stability, AADONA NAS products come with a standard 3-year warranty, and customers have the option to extend the warranty period. The one-time cost structure eliminates any restrictions on users, features, or performance, making AADONA NAS a cost-effective and unrestricted solution. Manufactured in India, AADONA NAS solutions have a successful track record in critical applications for both government and non-government organizations.
                                       </p>
                                    </div>                  
                                    <?php
                              }
							  
							   
							  
                        }
                        else{
                              if($_SERVER['REQUEST_URI']=="/network-attached-storage"){
                                    ?>
                                    <div class="col-md-12">
                                       <p class="text-justify">
                                          AADONA offers a high-performance Network Attached Storage (NAS) solution designed for customers seeking a robust and reliable NAS system. With a wide range of models available, AADONA provides options to suit various requirements. Additionally, AADONA offers customized solutions tailored to meet the specific needs of customers' critical applications.
                                       </p>
                                       <p class="text-justify">
                                          The AADONA NAS solution encompasses models ranging from 4-bay desktop models to 24 bay rack mount models, providing flexibility in terms of form factor and storage capacity. This range allows customers to choose the ideal NAS system that meets their storage requirements.
                                       </p>
                                       <p class="text-justify">
                                          AADONA is renowned for the reliability, performance, and stability of its NAS products. Built with quality components and a focus on delivering optimal performance, AADONA NAS solutions ensure smooth operation and efficient data storage and retrieval.
                                       </p>
                                       <p class="text-justify">
                                          To further ensure customer satisfaction and peace of mind, all AADONA NAS products are covered under a standard 3-year warranty. Additionally, customers have the option to avail a 2-year extended warranty at a nominal cost, providing extended coverage and support.
                                       </p>
                                       <p class="text-justify">
                                          AADONA NAS solutions are characterized by their one-time cost structure. There are no subscription or license systems in place that limit the number of users, features, or performance capabilities. This allows customers to fully utilize the NAS solution without any restrictions, ensuring seamless and efficient data management.
                                       </p>
                                       <p class="text-justify">
                                          AADONA's NAS products are proudly made in India and have already been successfully deployed in numerous critical applications across both government and non-government organizations. This track record demonstrates the reliability and effectiveness of AADONA NAS solutions in demanding environments.
                                       </p>
                                       <p class="text-justify">
                                          In summary, AADONA's High Performance Network Attached Storage (NAS) solution is designed for customers who require a serious and reliable NAS system. With a wide range of models to choose from and the ability to provide customized solutions for critical applications, AADONA offers flexibility to meet diverse storage needs. Known for their reliability, performance, and stability, AADONA NAS products come with a standard 3-year warranty, and customers have the option to extend the warranty period. The one-time cost structure eliminates any restrictions on users, features, or performance, making AADONA NAS a cost-effective and unrestricted solution. Manufactured in India, AADONA NAS solutions have a successful track record in critical applications for both government and non-government organizations.
                                       </p>
                                    </div>                  
                                    <?php
                              }

                              if($_SERVER['REQUEST_URI']=="/product-list/rack-mount-nas"){
                                    ?>
                                    <div class="col-md-12">
                                       <p class="text-justify">
                                          
                                       </p>
                                    </div>                  
                                    <?php
                              }

                              

                              if($_SERVER['REQUEST_URI']=="https://aadona.com/enterprise-network-attached-storage"){?>
                                 <div class="col-md-12">
                                       <p class="text-justify">
                                          
                                       </p>
                                    </div>
                                 <?php
                                 }
                        }
                     ?>
			   
                  
                  <?php if ($title == 'Network Attached Storage | Aadona'): ?>
               
                  <div class="col-md-12">
                     <p class="text-justify">
                        AADONA offers a high-performance Network Attached Storage (NAS) solution designed for customers seeking a robust and reliable NAS system. With a wide range of models available, AADONA provides options to suit various requirements. Additionally, AADONA offers customized solutions tailored to meet the specific needs of customers' critical applications.
                     </p>
                     <p class="text-justify">
                        The AADONA NAS solution encompasses models ranging from 4-bay desktop models to 24 bay rack mount models, providing flexibility in terms of form factor and storage capacity. This range allows customers to choose the ideal NAS system that meets their storage requirements.
                     </p>
                     <p class="text-justify">
                         AADONA is renowned for the reliability, performance, and stability of its NAS products. Built with quality components and a focus on delivering optimal performance, AADONA NAS solutions ensure smooth operation and efficient data storage and retrieval.
                         </p>
                         <p class="text-justify">
                             To further ensure customer satisfaction and peace of mind, all AADONA NAS products are covered under a standard 3-year warranty. Additionally, customers have the option to avail a 2-year extended warranty at a nominal cost, providing extended coverage and support.
                         </p>
                         <p class="text-justify">
                             AADONA NAS solutions are characterized by their one-time cost structure. There are no subscription or license systems in place that limit the number of users, features, or performance capabilities. This allows customers to fully utilize the NAS solution without any restrictions, ensuring seamless and efficient data management.
                         </p>
                         <p class="text-justify">
                             AADONA's NAS products are proudly made in India and have already been successfully deployed in numerous critical applications across both government and non-government organizations. This track record demonstrates the reliability and effectiveness of AADONA NAS solutions in demanding environments.
                         </p>
                         <p class="text-justify">
                             AADONA's High Performance Network Attached Storage (NAS) solution is designed for customers who require a serious and reliable NAS system. With a wide range of models to choose from and the ability to provide customized solutions for critical applications, AADONA offers flexibility to meet diverse storage needs. Known for their reliability, performance, and stability, AADONA NAS products come with a standard 3-year warranty, and customers have the option to extend the warranty period. The one-time cost structure eliminates any restrictions on users, features, or performance, making AADONA NAS a cost-effective and unrestricted solution. Manufactured in India, AADONA NAS solutions have a successful track record in critical applications for both government and non-government organizations.
                         </p>
                       
                  </div>

                  <?php endif ?>
                  <?php if ($parent_category->title == 'SMB'): ?>
                  <!-- <p class="text-justify">
                     Data is the key to unlocking business success. To find your edge and safeguard your critical data stop depending on just any system and switch to AADONA’s high reliability, high-performance range of NAS solutions.<br><br>
                     Our solutions are as diverse as your requirements. From cost-effective SMB desktop NAS solutions to our cutting-edge, high-performance product range. AADONA Helios runs on the world’s most popular software platform and promises returns on your investment unlike any other solution out there, giving you the flexibility to choose the right configuration that fits your budget.<br><br>
                     Our engineering team continuously strives to exceed our benchmarks in terms of quality, reliability, and performance and we understand that the best products are those that not just meet but exceed requirements. Get in touch today to discuss your specific needs and we are confident you will find a match in one of our pre-built solutions.<br><br>
                     Customer satisfaction is important to us, so we don’t stop here, we go further. Our engineering team is happy to talk to you about your project-specific requirements. Our custom-built solutions are just right for your SMB NAS requirements.
                     </p> -->
                  <?php endif ?>
                  <?php if ($parent_category->title == 'Network Switches'): ?>
                  <div class="col-md-12">
                     <p class="text-justify">
                        AADONA enterprise network switch solutions offer premium networking equipments whichare cost-effective, high in quality, high in reliability and performance. The AADONA switchsolutions have mission-oriented design and a complete product portfolio to offer the best-fit solutions for customers. The solutions meet not only SME and enterprise customer needs but also the requirements of different key vertical markets.<br><br>
                        AADONA enterprise network switches are the best fit for wireless deployments, surveillance deployments, smart city projects, IP Phones, or network backbone of SME & enterprise IT infrastructure.
                     </p>
                  </div>
                  <?php endif ?>
                  <?php if ($parent_category->title == 'Industrial Switches'): ?>
                  <div class="col-md-12">
                     <p class="text-justify">
                        AADONA offers a range of true industrial and reliable Ethernet switches designed to thrive in challenging environments characterized by wide temperature variations, heavy vibration, and shock. These high-temperature Ethernet switches are built to operate effectively in extreme hot and cold conditions, ensuring reliable network connectivity in demanding settings.
                     </p>
                     <p class="text-justify">
                        The AADONA true industrial Ethernet switch family comprises both managed and unmanaged switches, providing flexibility to accommodate different networking requirements. These switches are equipped with features such as Power over Ethernet (PoE) support, gigabit ports, SFP slots, and variable voltage capabilities, allowing for versatile and robust network deployments.
                     </p>
                     <p class="text-justify">AADONA's true industrial switches are specifically engineered for use in harsh environments, including factories, warehouses, refineries, and rolling stock. These hardened switches are designed to withstand challenging conditions and can be effectively utilized in a wide range of networking and surveillance applications. Whether it's railway stations, subway stations, high terrains, or smart city deployments, AADONA's true industrial switches deliver reliable network performance.</p>
                     <p class="text-justify">Recognizing that industrial environments vary in design and functionality, AADONA's true industrial switch family includes a range of industrial specialty switches to cater to specific needs. These specialty switch models include DIN-rail Ethernet switches (or DIN mount switches), railway switches, and front access wall mount switches. This diverse product lineup ensures that AADONA can provide tailored solutions to meet the unique requirements of different industrial settings.</p>
                     <p class="text-justify">AADONA's true industrial Ethernet switches are built to withstand shock and vibration, ensuring uninterrupted network connectivity even in physically demanding environments. Multiple redundant power inputs with overload current protection contribute to enhanced reliability, and select models feature a power failure alarm for added convenience. Furthermore, AADONA's true industrial Ethernet switches comply with industry safety standards for electromagnetic emissions/immunity, ensuring compatibility with existing infrastructure.</p>
                     <p class="text-justify">AADONA's industrial switches are proudly made in India, reflecting the brand's commitment to quality and reliability. This localized production enables efficient supply chains and localized support for customers</p>
                     <p class="text-justify">AADONA's true industrial Ethernet switches are designed to thrive in environments with wide temperature variations, vibration, and shock. Offering both managed and unmanaged options with advanced features, these true industrial switches are well-suited for deployment in harsh settings. The industrial switch family includes specialty models to cater to diverse needs, and features such as shock and vibration resistance, multiple redundant power inputs, and compliance with safety standards contribute to their reliability. Made in India, AADONA's industrial switches provide dependable network solutions for a wide range of industrial applications.</p>
                     
                  </div>

                  <?php endif ?>
                  <?php if ($parent_category->title == 'Network Security'): ?>
                  <p class="text-justify">
                     ICARUS NG-UTM and UTM Firewall product line offers wide range of features to address your network data security challenges, we offer premium equipment with high reliability and performance by profound knowledge in telco-class equipment’s. The AADONA ICARUS series solutions have mission-oriented design and a complete product portfolio to offer the best-fit solutions for customers critical network needs. The solutions meet not only SMB and Enterprise needs, but also requirements of different vertical markets like Education, Government, Corporate, BSFI, PSU’s, Railways, Manufacturing, Retail Chains etc.<br><br>
                     Along side offering Network Security equipments, we offer comprehensive Security Audit to find loop holes in your network that can become venerability points to steal your critical business and customer data, lately these kind of breaches cost you business or customers. Lost trust, lost market worth and so on, If you wish to know more on Security Audit Services please visit VAPT section under IoT.
                  </p>
                  <?php endif ?>
                  <?php if ($parent_category->title == 'Enterprise Wireless'): ?>
                  <div class="col-md-12">
                     <p class="text-justify">
                       AADONA's Apollo Series is a range of high-performance enterprise wireless access points and controllers designed to meet the demanding requirements of modern wireless networking. The Apollo access point series offers a wide range of options, from 802.11ac to the latest 802.11ax (Wi-Fi 6) standards, covering indoor, outdoor, and point-to-point deployments.
                     </p>
                     <p class="text-justify">
                         In today's interconnected world, communication is essential, and Wi-Fi has become a ubiquitous necessity. The post-COVID era has witnessed a significant surge in the demand for high-quality and cost-effective Wi-Fi solutions, and with the impending arrival of 5G technology, this demand is expected to further escalate.
                     </p>
                     <p class="text-justify">
                        AADONA's wireless solutions, available in both 802.11ac and 802.11ax flavors, are designed to fulfill the rising customer expectations for robust and reliable wireless connectivity, regardless of the environmental challenges. The features offered by the access points address the diverse needs of customers and ensure seamless connectivity even in demanding environments. 
                     </p>
                     <p class="text-justify">
                        The Apollo series wireless access points and controllers from AADONA are not limited to addressing SMB (Small and Medium-sized Business) needs; they also cater to the requirements of different vertical markets. Whether it's education, healthcare, hospitality, government, manufacturing, retail chains, smart cities, or city surveillance, AADONA's solutions are tailored to meet the specific demands of each industry.     
                     </p>
                     <p class="text-justify">
                        AADONA's Apollo series wireless access points and controllers are suitable for both indoor and outdoor applications, offering true enterprise-grade smart wireless networks. Regardless of the deployment scenario, these solutions provide highly secure performance and reliable throughput, even in high-density user environments. The combination of enterprise-grade wireless controllers and access points ensures optimal connectivity and seamless user experiences.         
                     </p>
                     <p class="text-justify">
                         AADONA's Apollo Series offers high-performance enterprise wireless access points and controllers. With a wide range of options covering different Wi-Fi standards and deployment scenarios, AADONA addresses the increased demand for high-quality and cost-effective Wi-Fi solutions. The Apollo series caters to various industry verticals and provides true enterprise-grade smart wireless networks. These solutions deliver highly secure performance and reliable throughput, even in high-density user environments. AADONA's wireless offerings are designed to meet the evolving needs of customers in a wide range of sectors, ensuring seamless connectivity and optimal wireless networking experiences.
                     </p>
                     
                  </div>
                  
                  <?php endif ?>
                  <?php if ($title == 'Servers & Workstations | Aadona'): ?>
                  <p class="text-justify">
                     Servers and workstations are key to your network infrastructure, data is today’s Gold, data lost is business loss. To maintain your data sanity you need reliable workstations and servers.
                     Our engineering team continuously strives to exceed our benchmarks in terms of quality, reliability, and performance and we understand that the best products are those that not just meet but exceed requirements. Get in touch today to discuss your specific needs and we are confident you will find a match in one of our pre-built solutions.<br><br>
                     Customer satisfaction is important to us, so we don’t stop here, we go further. Our engineering team is happy to talk to you about your project-specific requirements. Our custom-built solutions are just right for your SME and enterprise customers.
                  </p>
                  <?php endif ?>
                  
                  <?php
                     if(count($product_data) > 0){
                        foreach ($product_data as $product) {
                           $product_images = explode(',', $product['images']);
                           $image_names = explode(',', $product['images']);
                           $image_url = '';
                           foreach($image_names as $img)
                           {
                              $image_url = $this->Common_Model->get_file_url($img, 'uploads/products/');
                              break;
                           }
                     ?>
                  <div class="col-md-4">
                     <div class="product-default">
                        <figure>
                           <a href="<?php echo base_url('product/'.$product['slug']);?>">
                           <img src="<?php echo $image_url;?>" width="280" alt="<?php echo $product['title']; ?>" height="280" alt="product" />
                           <img src="<?php echo $image_url;?>" width="280"  alt="<?php echo $product['title']; ?>" height="280" alt="product" />
                           </a>
                        </figure>
                        <div class="product-details">
                           <h3 class="product-title">
                              <a href="<?php echo base_url('product/'.$product['slug']);?>"><?php echo $product['title']; ?></a>
                           </h3>
                           <div class="product-action">
                              <a href="<?php echo base_url('product/'.$product['slug']);?>" class="btn-icon btn-add-cart">
                              <i class="fa fa-arrow-right"></i>
                              <span>View Now</span>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php
                     }
                     }else{
                     ?>
                  <div class="col-md-12">
                     <div class="product-default">
                        <div class="product-details">
                           <h3 class="product-title">
                              No product(s) found!
                           </h3>
                        </div>
                     </div>
                  </div>
                  <?php
                     }
                     ?>
               </div>
            </div>
         </div>
      </div>
      </div>
      </div>
   </section>
   <script type="text/javascript">
      $("#active_tab").parent('.widget-title').css({"background-color":"rgb(255 255 255)","padding":"7px"});

   </script>
</main>
<?php include './application/views/common/footer.php';?>
