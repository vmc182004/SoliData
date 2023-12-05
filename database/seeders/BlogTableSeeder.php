<?php

namespace Database\Seeders;
use App\Models\Noticia;
use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Noticia::create([
            'titulo_noticia' => '¿Qué tan importante es el análisis de datos para el monitoreo de riesgos financieros?',
            'texto_corto' => 'El uso de herramientas de automatización y el análisis de datos es relevante para el monitoreo de los riesgos financieros en el año 2022 y los años subsiguientes por varias razones.',
            'texto_largo' => 'El uso de herramientas de automatización y el análisis de datos es relevante para el monitoreo de los riesgos financieros en el año 2022 y los años subsiguientes por varias razones.
            En primer lugar, el volumen de datos disponibles ha aumentado significativamente en los últimos años, lo que hace difícil para las entidades Solidarias gestionar y analizar de manera eficiente toda esta información de manera manual, ya que tienen mayor riesgo operativo y es costoso. Y en segundo lugar, el mercado solidario es dinámico en términos de riesgos y en términos de supervisión, por lo que es importante contar con herramientas que permitan realizar un seguimiento en un tiempo oportuno. Las herramientas de automatización y el análisis de datos permiten hacer un seguimiento continuo de los riesgos y detectar de manera oportuna cualquier cambio en el corto o largo plazo que pueda afectar el buen desempeño de las organizaciones solidarias.
            Además, el uso de herramientas de análisis de datos permiten obtener una visión más completa y precisa de los riesgos financieros y no financieros, pudiendo las entidades solidarias tomar decisiones más informadas y adoptar las medidas de gestión de riesgos más efectivas. ',
            'fecha_noticia'=> '2023-11-20',
            'image_noticia' => ''
        ]);

        Noticia::create([
            'titulo_noticia' => 'La Analítica de Datos ayuda a tomar mejores decisiones… ¿Cómo?',
            'texto_corto' => '1. Toma de decisiones mejoradas: el análisis de datos ayuda a los gerentes a tomar decisiones más informadas, al brindarles una visión integral de los datos. Esto les permite a identificar patrones, tendencias y correlaciones que pueden usarse para tomar mejores decisiones.',
            'texto_largo' => '1. Toma de decisiones mejoradas: el análisis de datos ayuda a los gerentes a tomar decisiones más informadas, al brindarles una visión integral de los datos. Esto les permite a identificar patrones, tendencias y correlaciones que pueden usarse para tomar mejores decisiones.

            2. Mayor eficiencia: al analizar los datos, los gerentes pueden identificar áreas de ineficiencia y tomar medidas correctivas para mejorar los procesos, canales y productos o diferentes elementos de los sistemas de riesgo.
            
            3. Satisfacción del cliente: El análisis de datos puede ayudar a los gerentes a comprender mejor las necesidades y preferencias de los clientes, lo que les permite adaptar sus productos y servicios para satisfacer las demandas de los clientes.
            
            4. Mayor rentabilidad: al analizar los datos, los gerentes pueden identificar áreas de ahorro potencial y áreas para la generación de mayores ingresos, lo que les permite maximizar los excedentes.',
            'fecha_noticia'=> '2023-11-20',
            'image_noticia' => ''
        ]);

        Noticia::create([
            'titulo_noticia' => '¿Cómo se puede medir la efectividad luego de aplicar analítica de datos dentro de las organizaciones?',
            'texto_corto' => 'Por ejemplo, el análisis de datos puede ayudar a una empresa financiera a identificar áreas en las que se pueden realizar ahorros, como en la reducción de gastos en energía o en la compra de  suministros.',
            'texto_largo' => 'En el proceso de ahorro en costos:

            Por ejemplo, el análisis de datos puede ayudar a una empresa financiera a identificar áreas en las que se pueden realizar ahorros, como en la reducción de gastos en energía o en la compra de  suministros. También puede ayudar a una empresa financiera a identificar áreas en las que se pueden hacer mejoras en eficiencia, lo que puede contribuir a reducir los costos operativos. Además, el análisis de datos puede ayudar a una empresa financiera a tomar decisiones de negocios más informadas y a medir el rendimiento de sus operaciones, lo que puede ayudar a reducir los costos a largo plazo.
            
            
            Desde la información histórica y niveles de riesgo:
            
            En las empresas que manejan productos financieros, poder detectar patrones y tendencias en sus datos financieros, lo que puede ayudarla a identificar posibles riesgos en su negocio, dado que, dentro de cada patrón o ciclicidad de los datos, hay una causa que se repite, y esta puede ser controlada de manera oportuna. También puede ayudar a una empresa financiera a evaluar la rentabilidad de diferentes inversiones y a tomar decisiones sobre dónde invertir su dinero, teniendo en cuenta además el nivel de riesgo de cada inversión dependiendo de los parámetros seleccionados para el inversionista.
            
            Segmentación de clientes:
            
            La analitica de datos ayuda a las entidades solidarias a comprender mejor a sus asociados y a ofrecerles productos y servicios que se ajusten a sus necesidades y preferencias, lo que puede ayudarla a mantener su fidelidad y a reducir el riesgo de pérdida de clientes.
            
            Normatividad interna:
            
            La analítica de datos puede ayudar a una empresa a identificar posibles incumplimientos de la normativa, como transacciones sospechosas o actividades fraudulentas de manera automática y cumpliendo con los parámetros escogidos.
            
            
            Normatividad externa:
            
            
            También puede ayudar a una empresa a analizar sus datos de cumplimiento normativo y a detectar posibles problemas o áreas de mejora en su cumplimiento. Además, la analítica de datos puede ayudar a una empresa a desarrollar modelos predictivos que puedan identificar situaciones de riesgo potencial de incumplimiento normativo y permitir que la empresa tome medidas preventivas para evitar dichos riesgos.',
            'fecha_noticia'=> '2023-11-20',
            'image_noticia' => ''
        ]);
    }
}
