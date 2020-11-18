#Конфигурация  
    collector:
      settings:
        serialize_group: collector  - группа сериализации
        collector: 'Evrinoma\CollectorBundle\Chain\Collection' - агрегирующий объект
        list: - сущности
          - 'App\Collector\User'
          - 'user.project'
          - 'App\Collector\ContrAgent'

#Как подключать сущности
В конфигурации, с помощью параметра list укзаываем классы сущностей наследующиеся от абстракции AbstractCollectorHandler имплементирующие интерфейс CollectorHandlerInterface


#Как использовать serializer
Поумолчанию используется группа "collector"


Если нужно переопределить группу анатации нужно создать следующую структуру

создать папку

    config/serializer/CollectorBundle/
       
создать файл Chain.Collection.yml

    Evrinoma\CollectorBundle\Chain\Collection:
      exclusion_policy: ALL
      properties:
        collection:
          groups: [ collector, user ]

и в конфигурации jms_serializer.yaml прописать созданные метаданые

      metadata:
        directories:
          CollectorBundle:
            namespace_prefix: "Evrinoma\\CollectorBundle"
            path: "%kernel.project_dir%/config/serializer/CollectorBundle"

