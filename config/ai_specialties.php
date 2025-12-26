<?php

return [

    // ربط المرض مع التخصص الطبي المناسب
    // ملاحظة: هذه التخصصات تقريبية للمساعدة في التوجيه فقط، وليست بديلاً عن رأي طبي حقيقي.
    'disease_to_specialty' => [

        // تنفّسي / التهابات صدرية
        'influenza'                                           => 'Internal Medicine',
        'common cold'                                         => 'Internal Medicine',
        'covid-19'                                            => 'Internal Medicine',
        'acute bronchiolitis'                                 => 'Pulmonology',
        'acute bronchitis'                                    => 'Pulmonology',
        'acute bronchospasm'                                  => 'Pulmonology',
        'acute respiratory distress syndrome (ards)'          => 'Pulmonology',
        'asthma'                                              => 'Pulmonology',
        'atelectasis'                                         => 'Pulmonology',
        'acute sinusitis'                                     => 'Otolaryngology (ENT)',
        'allergy'                                             => 'Allergy & Immunology',
        'allergy to animals'                                  => 'Allergy & Immunology',
        'seasonal allergies (hay fever)'                      => 'Allergy & Immunology',

        // جهاز هضمي / كبد / بنكرياس
        'gastritis'                                           => 'Gastroenterology',
        'acute pancreatitis'                                  => 'Gastroenterology',
        'ascending cholangitis'                               => 'Gastroenterology',
        'alcoholic liver disease'                             => 'Gastroenterology',
        'appendicitis'                                        => 'General Surgery',
        'abdominal hernia'                                    => 'General Surgery',
        'abdominal aortic aneurysm'                           => 'Vascular Surgery',
        'anal fissure'                                        => 'General Surgery',
        'anal fistula'                                        => 'General Surgery',
        // 🆕 الحالات اللي طلعت في الصورة:
        'hiatal hernia'                       => 'Gastroenterology',
        'esophagitis'                        => 'Gastroenterology',
        'stricture of the esophagus'         => 'Gastroenterology',
        'gastroesophageal reflux disease (gerd)' => 'Gastroenterology',
        'abscess of the pharynx'             => 'Otolaryngology (ENT)',
        // كلى / مسالك بولية
        'acute kidney injury'                                 => 'Nephrology',
        'benign kidney cyst'                                  => 'Nephrology',
        'bladder cancer'                                      => 'Urology',
        'bladder disorder'                                    => 'Urology',
        'bladder obstruction'                                 => 'Urology',
        'atonic bladder'                                      => 'Urology',
        'benign prostatic hyperplasia (bph)'                  => 'Urology',
        'balanitis'                                           => 'Urology',

        // قلب وأوعية دموية
        'angina'                                              => 'Cardiology',
        'aortic valve disease'                                => 'Cardiology',
        'arrhythmia'                                          => 'Cardiology',
        'atrial fibrillation'                                 => 'Cardiology',
        'atrial flutter'                                      => 'Cardiology',

        // أمراض دم / أورام
        'anemia'                                              => 'Hematology',
        'anemia due to chronic kidney disease'                => 'Nephrology',
        'anemia due to malignancy'                            => 'Hematology/Oncology',
        'anemia of chronic disease'                           => 'Internal Medicine',
        'aplastic anemia'                                     => 'Hematology',
        'bone cancer'                                         => 'Oncology',
        'brain cancer'                                        => 'Oncology',
        'breast cancer'                                       => 'Oncology',

        // عظام / مفاصل / روماتيزم
        'arthritis of the hip'                                => 'Orthopedics',
        'adhesive capsulitis of the shoulder'                 => 'Orthopedics',
        'avascular necrosis'                                  => 'Orthopedics',
        'bone disorder'                                       => 'Orthopedics',
        'bone spur of the calcaneous'                         => 'Orthopedics',
        'ankylosing spondylitis'                              => 'Rheumatology',

        // جلديّة
        'acanthosis nigricans'                                => 'Dermatology',
        'acariasis'                                           => 'Dermatology',
        'acne'                                                => 'Dermatology',
        'actinic keratosis'                                   => 'Dermatology',
        'dermatitis'                                          => 'Dermatology',
        'athlete\'s foot'                                     => 'Dermatology',
        'alopecia'                                            => 'Dermatology',
        'atrophic skin condition'                             => 'Dermatology',

        // عيون
        'acute glaucoma'                                      => 'Ophthalmology',
        'amblyopia'                                           => 'Ophthalmology',
        'astigmatism'                                         => 'Ophthalmology',
        'aphakia'                                             => 'Ophthalmology',
        'blepharitis'                                         => 'Ophthalmology',
        'blepharospasm'                                       => 'Ophthalmology',

        // أنف وأذن وحنجرة / فم
        'abscess of nose'                                     => 'Otolaryngology (ENT)',
        'abscess of the pharynx'                              => 'Otolaryngology (ENT)',
        'acute otitis media'                                  => 'Otolaryngology (ENT)',
        'benign paroxysmal positional vertical (bppv)'        => 'Otolaryngology (ENT)',
        'aphthous ulcer'                                      => 'Otolaryngology (ENT)',

        // جهاز عصبي
        'amyotrophic lateral sclerosis (als)'                 => 'Neurology',
        'alzheimer disease'                                   => 'Neurology',
        'autonomic nervous system disorder'                   => 'Neurology',
        'brachial neuritis'                                   => 'Neurology',
        'bell palsy'                                          => 'Neurology',

        // نفسي / سلوكي
        'anxiety'                                             => 'Psychiatry',
        'acute stress reaction'                               => 'Psychiatry',
        'adjustment reaction'                                 => 'Psychiatry',
        'bipolar disorder'                                    => 'Psychiatry',
        'depression'                                          => 'Psychiatry',
        'autism'                                              => 'Psychiatry',
        'asperger syndrome'                                   => 'Psychiatry',
        'attention deficit hyperactivity disorder (adhd)'     => 'Psychiatry',
        'alcohol abuse'                                       => 'Psychiatry',
        'alcohol intoxication'                                => 'Psychiatry',
        'alcohol withdrawal'                                  => 'Psychiatry',

        // غدد صماء / هرمونات
        'adrenal adenoma'                                     => 'Endocrinology',

        // نسائية / ولادة
        'atrophic vaginitis'                                  => 'Obstetrics & Gynecology',
        'benign vaginal discharge (leukorrhea)'               => 'Obstetrics & Gynecology',
        'breast infection (mastitis)'                         => 'Obstetrics & Gynecology',
        'breast cyst'                                         => 'Obstetrics & Gynecology',
        'birth trauma'                                        => 'Pediatrics',

        // أورام / نسائية / جراحة ثدي
        // (breast cancer مذكور فوق في الأورام)

        // صدر / رئة (متكرر)
        'abscess of the lung'                                 => 'Pulmonology',

        // أمراض أخرى متفرقة
        'achalasia'                                           => 'Gastroenterology',
        'athletic\'s foot'                                    => 'Dermatology', // لو ظهرت بهذا السبيلنج
        'atonic bladder'                                      => 'Urology',
        'atrophy of the corpus cavernosum'                    => 'Urology',
        'benign kidney cyst'                                  => 'Nephrology',
        'benign vaginal discharge (leukorrhea)'               => 'Obstetrics & Gynecology',
        'benign paroxysmal positional vertical (bppv)'        => 'Otolaryngology (ENT)',

        // تأكدي من مطابقة الإسم تماماً للي في الداتا (lowercase + نفس الأقواس)
    ],
];
